<?php
echo $this -> Html->css("pagetitle.css",['block'=>true]);
?>


<div class="container">
    <h3><?= __('Contact Us') ?></h3>
    <br></br>
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">First Name</label>
                <input type="firstname" class="form-control" id="inputEmail4" placeholder="eg. John">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Last Name</label>
                <input type="lastname" class="form-control" id="inputPassword4" placeholder="eg. Doe">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Email</label>
            <input type="email" class="form-control" id="inputAddress" placeholder="something@somethingelse.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="button" class="btn btn-primary">Submit</button>
    </form>
</div>
<br></br>
