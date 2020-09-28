<!-- Contact SECTION-->
<div class="container"><!-- container -->
  <h1 class="text-center pb-3 m-auto"><?=$title;?></h1>
  <div class="row">    <!-- row -->
    <div class="col-lg-6">
            
      <form class="text-center border border-light p-5 m-auto" action="" method="POST"><!-- form contact -->

        <h4 class="h4 mb-4">Feedback form</h4>
                    
        <?php
        if ($_POST) {
            if(count($errors) === 0){
                echo '<div class="alert alert-success"><p>Thank you! your message has been sent.</p></div>';
                if ($feedback_msg){
                    echo "<h3>$feedback_msg</h3>";
                }
            }else{
                echo '<div class="alert alert-block alert-error fade in">
                <p>The following error(s) occurred:</p><ul>';
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo '</ul></div>';
            } 
        }
        ?>
        <!-- Name -->
        <input type="text" class="form-control mb-4" placeholder="Name" name="name" required>

        <!-- Email -->
        <input type="email" name="email" class="form-control mb-4" placeholder="E-mail" required>

        <!-- Subject -->
        <label>Subject</label>
        <select class="custom-select mb-4" name="subject">
            <option value="" disabled>Choose option</option>
            <option value="1" selected>Feedback</option>
            <option value="2">Report a bug</option>
            <option value="3">Feature request</option>
            <option value="4">Feature request</option>
        </select>

        <!-- Message -->
        <div class="form-group">
            <textarea class="form-control rounded-0" rows="3" placeholder="Message" name="message"></textarea>
        </div>

        <!-- Copy -->
        <div class="custom-control custom-checkbox mb-4">
            <input type="checkbox" class="custom-control-input" id="contactFormCopy" name="contact-copy">
            <label class="custom-control-label" for="contactFormCopy">Send me a copy of this message</label>
        </div>

        <!-- Send button -->
        <div class="btn-block">
            <button class="btn btn-submit" type="submit">Send</button>
            <button class="btn btn-reset" name="reset" type="reset">Reset</button>
        </div>

      </form> <!-- ./form contact -->
    </div>

    <div class="col-lg-6">
        <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address
                    </div>
                    <div class="card-body">

                        <?php 
                        if (isset($address)):                        
                            foreach ($address as $addr):?>
                                <p><?php echo $addr['street'];?></p>
                                <p><?php echo $addr['city'];?></p>
                                <p><?php echo $addr['country'];?></p>
                                <p>Email : <?php echo $addr['email'];?></p>
                                <p>Tel.: <?php echo $addr['mobile'];?></p>
                            <?php endforeach;?>
                        <?php endif;?>
                    </div>
    </div>
  </div>    <!-- ./row -->

  <div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Comments
            </div>
            <div class="card-body">
            <?php
                if (isset($comments)):
                    printf("<h2>There Are %d Comments In Guest Book</h2>", count($comments));       
                    foreach ($comments as $key => $value) {
                        echo("<div class='top'><b>User ".$value[0]." </b> <a href='mailto:".$value[1]."'>".$value[1]."</a>  Added this: </div><div class='comment'>".strip_tags($value[2])."</div>"."<p>At ".strip_tags($value[3])."</p><hr>");
                    }
                else:
                    printf("<h2 style='color: #%x%x%x'>No Comments Yet...</h2>", 165, 27, 45);

                endif;
            ?>
            </div>
        </div>
    </div>
  </div>

    <!-- NEWSLETTER-->
    <section class="text-center border border-light p-5 my-3">
        <!-- Subscribe -->
        <h2 class="h4 mb-3">Let's be friends!</h2>


        <div class="text-center border border-light p-5">
            <form class="flex-form mb-5">
                <label for="from">
                    <i class="fas fa-info-circle"></i>
                </label>
                <input type="email" placeholder="Enter your email address">
                <input type="submit" value="Subscribe">
            </form>
        </div>
        <p class="mt-3">Join our mailing list. We write rarely, but only the best content.</p>
        <p class="my-3">
            <a href="" target="_blank">See the last newsletter</a>
        </p>
    </section>
</div><!-- ./container -->
    