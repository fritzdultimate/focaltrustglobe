<!-- Send email -->

<div id="modal-ajax" class="modal fade send-user-email" tabindex="-1"><div id="main-modal-content">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-pantone">
          <h4 class="modal-title"><i class="fa fa-edit"></i> Send Mail <span id="send-to">(email@domain.com)</span></h4>
          <button type="button" class="close dismiss-modal" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <form  class="form actionForm send-user-email-form">
        <input type="hidden" name="ids" value="1b667862cb93ecba7c392f57bb29763b">
        <input type="hidden" name="email_to" value="jdixonfuturesound@gmail.com">
        <div class="modal-body">
          <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>To</label>
                        <input type="text" name="email" value="email@domain.com" readonly="readonly" class="form-control">

                    </div>
                </div> 
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" value="" class="form-control">

                    </div>
                </div> 
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name=""></textarea>

                    </div>
                </div>           </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1 send-user-email-btn">Submit</button>
          <button type="button" class="btn btn-dark dismiss-modal" data-dismiss="modal">Close</button>
        </div>
        </form>    </div>
  </div>
</div>


</div>

<script>
    let btns = document.querySelectorAll('.dismiss-modal');
    [...btns].forEach(el => {
        el.addEventListener('click', () => {
            document.querySelector('.send-user-email').style.display = 'none';
            document.querySelector('.send-user-email').classList.remove('show');
        })
    })
</script>