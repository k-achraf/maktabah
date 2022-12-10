<footer class="footer">
    <div class="container bottom_border">
        <br>
        <div class="text-center"><h4>Subscribe</h4></div>
        <br>
        <ul class="foote_bottom_ul_amrc">
            <li><a href="#" id="emailClick">Email</a></li>
            <li><a href="//api.whatsapp.com/send?phone=213674756914&text=Hello">Whats'up</a></li>
        </ul>
    </div>


    <div class="container">
        <ul class="foote_bottom_ul_amrc">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/ask')}}">Ask a Librarian</a></li>
            <li><a href="{{url('/contactus')}}">Contact US</a></li>
            <li><a href="#">Forum</a></li>
            <li><a href="{{url('/about')}}">About Us</a></li>
        </ul>
        <!--foote_bottom_ul_amrc ends here-->
        <p class="text-center">Copyright @2020 | <a target="_blank" href="{{url('/')}}">OMEGA</a></p>

        <ul class="social_footer_ul">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
        <!--social_footer_ul ends here-->
    </div>

</footer>
<div class="modal fade" id="emailmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subscribe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email address">
                        <small id="emailHelp" class="form-text text-muted">Enter your email to receive all new</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
