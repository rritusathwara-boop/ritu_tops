class InstaStory {
    protected int storyViews = 500;
}

class SponsoredStory extends InstaStory {

    void displayViews() {
        System.out.println("Story Views: " + storyViews);
    }
}

public class StoryDemo {
    public static void main(String[] args) {

        SponsoredStory story = new SponsoredStory();

        story.displayViews();
    }
}