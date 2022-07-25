<?php
include "header.php";
$send='';
if (@$_POST['isSave']) {

    if (@$_POST['amount'])
    {
        $amout=$_POST['amount'];
    }
    else
    {
        $amout=$_POST['amountgr'];
    }

    $sql = $db->prepare('insert into donations set dname=:dname, email=:email, amount=:amount,cause_id=:cause_id');
    $sql->execute([
        'dname' => $_POST['name'],
        'email' => $_POST['email'],
        'amount' => $amout,
        'cause_id' => $_POST['cause_id']
    ]);

    $send=1;

    ?>
    <meta http-equiv="refresh" content="3; url=donate.php">
<?php

}
$sql=$db->prepare('select * from causes where is_deleted=:isd');
$sql->execute(
    [
        'isd'=>0
    ]
);
$causes=$sql->fetchAll();
?>
    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/donbanner.jpg')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>Make Donation</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.php">Home</a></li>
                <li class="active">Make Donation</li>
            </ul>
            <?php
            if (@$send) {
                ?>
                <div class="alert alert-success" role="alert">
                    Your donation has been saved.Thanks.
                </div>
                <?php
            }
            ?>
        </div>

    </section>
    <!--End Banner Section -->

    <!--Donate Section-->
    <section class="donate-section">
        <div class="auto-container">
        	<div class="tabs-box">
                <div class="row clearfix">

                    <!--Title Column-->
                    <div class="title-column col-lg-6 col-md-12 col-sm-12">
                    	<div class="inner">
                        	<h2>Please Make Your Donation</h2>
                            <div class="text">A donation is a gift for charity, humanitarian aid, or to benefit a cause. A donation may take various forms, including money, alms, services, or goods such as clothing, toys, food, or vehicles. A donation may satisfy medical needs such as blood or organs for transplant.</div>
                            <figure class="image-box"><img class="lazy-image" src="images/background/donate.jpg" data-src="images/background/donate.jpg" alt=""></figure>
                        </div>
                    </div>

                    <!--Form Column-->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                    	<div class="inner">
                        	<div class="donate-form">
                                <form method="post" id="myForm">
                                    <input type="hidden" name="isSave" value="1">

                                    <h3>Your Donation</h3>

                                    <div class="form-group">
                                        <div class="field-label">How much would you like to donate?</div>
                                        <div class="select-amount clearfix">
                                            <div class="select-box"><input type="radio" name="amountgr" id="radio-one" value="10"><label for="radio-one">$10</label></div>
                                            <div class="select-box"><input type="radio" name="amountgr" id="radio-two" value="20"><label for="radio-two">$20</label></div>
                                            <div class="select-box"><input type="radio" name="amountgr" id="radio-three" value="50" checked><label for="radio-three">$50</label></div>
                                            <div class="select-box"><input type="radio" name="amountgr" id="radio-four" value="100"><label for="radio-four">$100</label></div>
                                        </div>
                                        <div class="input-box"><input type="text" name="amount" value="" placeholder="or Give a Custom Amount"></div>

                                    </div>

                                    <div class="method">
                                        <h3>Payment Method</h3>
                                        <div class="form-group">
                                            <div class="clearfix">
                                            	<div class="radio-block"><input type="radio" id="radio-1" name="method" checked><label for="radio-1">EFT via Bank</label></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="method">
                                        <h3>Select Cause</h3>
                                        <div class="form-group">
                                            <div class="clearfix">
                                                <select class="form-group" name="cause_id">
                                                    <?php

                                                    foreach ($causes as $cause) {
                                                        ?>
                                                        <option value="<?=$cause['id']?>"><?=$cause['title']?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="personal-info">
                                    	<h3>Personal Information</h3>

                                        <div class="row clearfix">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div class="field-label">Name</div>
                                                <input type="text" name="name" value="" placeholder="Name" required>
                                            </div>


                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div class="field-label">Email address</div>
                                                <input type="email" name="email" value="" placeholder="Email address" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="theme-btn btn-style-one" data-sitekey="6LeG3N0ZAAAAAC7JH0vTwO0s5gqWia_TPtLbGc3L" data-callback='onSubmit'><span class="btn-title">Donate Now</span></button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>





<?php
include "footer.php";

?>
