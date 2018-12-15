    <h1> Home Page </h1>
</header>
<?php if(isset($_SESSION['user_id'])) { ?>
    <input type="hidden" name="user_id" value="<?=$users_id?>">
<?php } ?>
<header id="filter_stories">
    <label>Search: <input type="text" name="search_box" value=""></label>
    <label>Sort: 
        <select name="sort_menu">
            <option value="date">Most Recent</option>
            <option value="likes">Most Likes</option>
            <option value="dislikes">Most Dislikes</option>
            <option value="favorites">Most Favorites</option>
            <option value="comments">Most Comments</option>
        </select>
    </label>
    <?php if(isset($_SESSION['user_id'])) { ?>
        <span class="add_story"><img src="../icons/add_icon.png" alt="Add story"> </span>
    <?php } else { ?>
        <span class="add_story"></span>
    <?php } ?>
</header>