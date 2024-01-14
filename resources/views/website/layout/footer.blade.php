<footer class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="absolute-middle">
                    <a href="/"><img src="public/{{$applicationDetails['logo']}}" alt="logo" class="w-100"></a>
                </div>
            </div>
            <div class="col-md-3">
                <a href="/about" class="d-block text-light">About Us</a>
                <a href="tel:{{$applicationDetails['phone']}}" class="d-block text-light">Contact Us</a>
                <a href="/blog" class="d-block text-light">Blog</a>
            </div>
            <div class="col-md-3">
                <a href="#" class="d-block text-light">Careers</a>
                <a href="#" class="d-block text-light">Support</a>
                <a href="/privacy-policy" class="d-block text-light">Privacy Policy</a>
            </div>
            <div class="col-md-3">
                <div class="absolute-middle">
                    <a href="/"><img src="public//website/images/googleplay.png" alt="logo" class="w-100"></a>
                </div>
            </div>
        </div>
        <div class="text-center pt-3">
            <p>&copy IB</p>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="public/website/js/website.js"></script>
@yield('script')


</body>
</html>