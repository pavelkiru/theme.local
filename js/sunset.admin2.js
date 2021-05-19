jQuery(document).ready(function ($) {

    let mediaUploader;

    $('#upload-button').on('click',function (e) {
        e.preventDefault();
        if(mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title:'Choose a profile picture',
            button: {
                text: 'Choose Picture'
            },
            multiple: false
        })

        mediaUploader.on('select', function () {
            attachement = mediaUploader.state().get('selection').first().toJSON();
            $('#profile-picture').val(attachement.url);
            $('#profile-picture-preview').css('background-image','url(' + attachement.url + ')');
        });

        mediaUploader.open();
    });

    $('#remove-picture').on('click', function (e) {
        e.preventDefault();

        let answer = confirm('Are you sure to remove picture?');

        if(answer) {
            $('#profile-picture').val('');
            $('.sunset-general-form').submit();
        }
    });
});