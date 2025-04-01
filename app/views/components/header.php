<header>
    <nav>
        <a href="/">Home</a>
        <a href="/register">Register</a>
        <a href="/login">Login</a>
        <a href="/books/index">Books</a>


        <?php 
        if(isset($_SESSION['user_id']) && $_SESSION['user_id']==1) {
            echo '<a href="/admin">Admin</a>';
        }
        ?>
    </nav>
</header>