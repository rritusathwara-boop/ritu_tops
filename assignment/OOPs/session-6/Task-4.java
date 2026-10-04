class UserProfile {

    private String phoneNumber;

    // Setter
    public void setPhoneNumber(String phoneNumber) {
        this.phoneNumber = phoneNumber;
    }

    // Getter
    public String getPhoneNumber() {
        return phoneNumber;
    }
}

public class UserProfileDemo {
    public static void main(String[] args) {

        UserProfile user = new UserProfile();

        // Set phone number
        user.setPhoneNumber("9876543210");

        // Get phone number
        System.out.println("Phone Number: " + user.getPhoneNumber());
    }
}