<?php
    include('partiels/header.php');
?>

    <main>
        <div class="main">
            <h1>Dashboard</h1>
            <br>
                <?php
                    if (isset($_SESSION['login'])){
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>
            <div class="flex-wrapper">
                <div class="wrapper">
                    <h1>4</h1>
                    <br>
                    <p>Categories</p>
                </div>
                <div class="wrapper">
                    <h1>8</h1>
                    <br>
                    <p>Foods</p>
                </div>
                <div class="wrapper">
                    <h1>7</h1>
                    <br>
                    <p>Admin</p>
                </div>
                <div class="wrapper">
                    <h1>2</h1>
                    <br>
                    <p>Orders</p>
                </div>
                <!-- <div class="wrapper">
                    <h1>Mantant</h1>
                    <br>
                    <p>categories</p>
                </div> -->
            </div>
        </div>
    </main>
    
<?php
    include('partiels/footer.php');
?>