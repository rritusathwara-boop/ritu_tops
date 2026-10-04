class SocialMediaUploader {

    void uploadContent() {
        System.out.println("Uploading content...");
    }
}

class InstagramUploader extends SocialMediaUploader {

    @Override
    void uploadContent() {
        System.out.println("Uploading photo/reel to Instagram.");
    }
}

class YouTubeUploader extends SocialMediaUploader {

    @Override
    void uploadContent() {
        System.out.println("Uploading video to YouTube.");
    }
}

public class UploadDemo {

    public static void main(String[] args) {

        SocialMediaUploader instagram = new InstagramUploader();
        SocialMediaUploader youtube = new YouTubeUploader();

        instagram.uploadContent();
        youtube.uploadContent();
    }
}