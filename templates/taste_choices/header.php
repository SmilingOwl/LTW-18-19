    <input type="hidden" name="user_id" value=<?=$user_id?>>
    <h3>Choose your <br> favorites topics!</h5>
    <?php if (isset($_SESSION['messages'])) {?>
        <section id="messages">
        <?php foreach($_SESSION['messages'] as $message) { ?>
            <div class="<?=$message['type']?>"><?=$message['content']?></div>
        <?php } ?>
        </section>
    <?php unset($_SESSION['messages']); } ?>
</header>