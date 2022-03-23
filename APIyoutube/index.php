<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube Video Detials</title>
</head>

<body>
    <?php
    require 'test.php';
    ?>
    <form action="#" method="POST">
        <label for="">Enter video URL</label>
        <input type="text" name="url" paceholder="Enter video url">
        <input type="submit" name="submit" value="submit">
    </form>
    <hr>
    <?php
    if (isset($data) === false ) {
        return;
    }
    ?>
    <table>
        <tr>
            <td>
                <img src=<?php echo $data->items['0']->snippet->thumbnails->high->url; ?> alt="">
            </td>
        </tr>
        <tr>
            <td>Title</td>
            <td><?php echo $data->items['0']->snippet->title; ?></td>
        </tr>
        <tr>
            <td>published Time</td>
            <td><?php echo $data->items['0']->snippet->publishedAt; ?></td>
        </tr>
        <tr>
            <td>Duration</td>
            <td><?php echo $data->items['0']->contentDetails->duration; ?></td>
        </tr>
        <tr>
            <td>Views</td>
            <td><?php echo $data->items['0']->statistics->viewCount; ?></td>
        </tr>
        <tr>
            <td>Likes</td>
            <td><?php echo $data->items['0']->statistics->likeCount; ?></td>
        </tr>
        <tr>
            <td>Comments</td>
            <td><?php echo $data->items['0']->statistics->commentCount; ?></td>
        </tr>
    </table>
</body>

</html>