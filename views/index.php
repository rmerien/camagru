<?php   
    $page = 'Feed';

    include './structure/v_pageStructure.php';
    include '../models/class/c_database.php';
?>

<?php echo $prePage; ?>

<div class='page' style='font-size:inherit'>
    <div id='feed-head'>
        <h2 id='feed-title'>Feed</h2>
        <input type='text' placeholder='Search by user..' id='searchbar'>
    </div>

    <div id='feed'>
    </div>
</div>

<script type="text/javascript" src="../models/js/feed.js"></script>

<?php echo $postPage; ?>
