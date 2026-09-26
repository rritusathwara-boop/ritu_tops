-- Software Engineering – M5 Database Management M5-A1
-- Section C: Mini Capstone
-- Food Ordering Database
-- MySQL / phpMyAdmin

CREATE DATABASE IF NOT EXISTS foodapp_db;
USE foodapp_db;

CREATE TABLE IF NOT EXISTS cap_restaurants (
    restaurant_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    city VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS cap_menu_items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    restaurant_id INT NOT NULL,
    item_name VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (restaurant_id) REFERENCES cap_restaurants(restaurant_id)
);

CREATE TABLE IF NOT EXISTS cap_orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    restaurant_id INT NOT NULL,
    item_id INT NOT NULL,
    quantity INT NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (restaurant_id) REFERENCES cap_restaurants(restaurant_id),
    FOREIGN KEY (item_id) REFERENCES cap_menu_items(item_id)
);

INSERT INTO cap_restaurants (name, city) VALUES
('Spice Garden', 'Ahmedabad'),
('Pizza Hub', 'Mumbai'),
('Royal Dine', 'Delhi');

INSERT INTO cap_menu_items
(restaurant_id, item_name, category, price)
VALUES
(1, 'Paneer Tikka', 'Starter', 250),
(1, 'Veg Biryani', 'Main Course', 220),
(1, 'Dal Makhani', 'Main Course', 200),
(1, 'Butter Naan', 'Main Course', 80),
(1, 'Lassi', 'Beverage', 100),
(2, 'Margherita Pizza', 'Pizza', 350),
(2, 'Farmhouse Pizza', 'Pizza', 450),
(2, 'Garlic Bread', 'Starter', 180),
(2, 'Cold Coffee', 'Beverage', 150),
(2, 'Veg Pasta', 'Main Course', 280),
(3, 'Paneer Tikka', 'Starter', 270),
(3, 'Paneer Butter Masala', 'Main Course', 300),
(3, 'Veg Biryani', 'Main Course', 250),
(3, 'Masala Lassi', 'Beverage', 120),
(3, 'Spring Roll', 'Starter', 180);

CREATE TABLE IF NOT EXISTS order_audit (
    audit_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    restaurant_id INT,
    action VARCHAR(20),
    log_time DATETIME
);

CREATE OR REPLACE VIEW restaurant_sales_summary AS
SELECT
    r.name AS restaurant_name,
    COUNT(o.order_id) AS total_orders,
    COALESCE(SUM(o.total_amount), 0) AS total_revenue
FROM cap_restaurants r
LEFT JOIN cap_orders o ON r.restaurant_id = o.restaurant_id
GROUP BY r.restaurant_id, r.name;

DROP PROCEDURE IF EXISTS add_order;

DELIMITER //

CREATE PROCEDURE add_order(
    IN p_customer_name VARCHAR(100),
    IN p_restaurant_id INT,
    IN p_item_id INT,
    IN p_quantity INT
)
BEGIN
    DECLARE v_price DECIMAL(10,2);
    DECLARE v_total DECIMAL(10,2);
    DECLARE v_restaurant_count INT;
    DECLARE v_item_count INT;

    START TRANSACTION;

    SELECT COUNT(*) INTO v_restaurant_count
    FROM cap_restaurants
    WHERE restaurant_id = p_restaurant_id;

    IF v_restaurant_count = 0 THEN
        ROLLBACK;
        SELECT 'Restaurant does not exist. Order cancelled.' AS message;
    ELSE
        SELECT COUNT(*) INTO v_item_count
        FROM cap_menu_items
        WHERE item_id = p_item_id
          AND restaurant_id = p_restaurant_id;

        IF v_item_count = 0 THEN
            ROLLBACK;
            SELECT 'Menu item does not belong to this restaurant. Order cancelled.' AS message;
        ELSE
            SELECT price INTO v_price
            FROM cap_menu_items
            WHERE item_id = p_item_id
              AND restaurant_id = p_restaurant_id;

            SET v_total = v_price * p_quantity;

            INSERT INTO cap_orders
            (customer_name, restaurant_id, item_id, quantity, total_amount)
            VALUES
            (p_customer_name, p_restaurant_id, p_item_id, p_quantity, v_total);

            COMMIT;
            SELECT 'Order added successfully.' AS message;
        END IF;
    END IF;
END //

DELIMITER ;

DROP TRIGGER IF EXISTS after_order_insert;

DELIMITER //

CREATE TRIGGER after_order_insert
AFTER INSERT ON cap_orders
FOR EACH ROW
BEGIN
    INSERT INTO order_audit
    (order_id, restaurant_id, action, log_time)
    VALUES
    (NEW.order_id, NEW.restaurant_id, 'INSERT', NOW());
END //

DELIMITER ;

CALL add_order('Ritu', 1, 1, 2);
CALL add_order('Ritu', 99, 1, 2);

SELECT * FROM cap_orders;
SELECT * FROM order_audit;
SELECT * FROM restaurant_sales_summary;
