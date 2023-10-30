@extends('website.layout.app')
@section('title')
Home
@endsection
@section('style')2
    
@endsection
@section('content')
<section id="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="pt-5 pb-3">IB learning & earning <br> Platform</h1>
                <div class="text py-3">
                    <p>It is a platform of learning and earning process where you can work as a part time work by your android phone when you are free at home.By using your own mother language you can learn this process very easily </p>
                </div>
                <div class="buttons py-2">
                    <a href="/log-in" class="btn btn-outline-light">Log In</a>
                    <a href="/register" class="btn btn-light ml-4">Sign Up</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="/public/website/images/heroBG.png" alt="" class="hero-image">
            </div>
        </div>
    </div>
</section>
<section id="why-us" class="py-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-7">
                <h3 class="short-heading">   Why Do You Choose IBLEARNING AND EARNING PLATFORM</h3>
                <div class="text">
                    <p>
                        Using the virtual social media in our society raising our income through online in our free time is the main purpose of our system. <br><br>
                        Many of us have a huge knowledge to prove our worth by working on a special post but we don’t have the opportunity to show our work infront of everyone.Here,you will get the opportunity to show and our industry will support you a lot from the beginning.
                    </p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="absolute-middle">
                    <img src="/publicimages/whyus.png" alt="" class="w-100">
                </div>
            </div>
        </div>
        <div class="icons">
            <div>
                <img src="/public/website/images/work-from-home.png" alt="iamge">
                <h4>Work From Home</h4>
                <p>There is no fixed zone here for doing work.You can work staying your comfort zone from your home.</p>
            </div>
            <div>
                <img src="/public/website/images/incentive.png" alt="iamge">
                <h4>Weekly Payment</h4>
                <p>The amount of your income  will be transferred to your account and you can withdraw it in a week.</p>
            </div>
            <div>
                <img src="/public/website/images/target.png" alt="iamge">
                <h4>No Selling Target</h4>
                <p>You just need to hold our system.There is no selling target here.</p>
            </div>
            <div>
                <img src="/public/website/images/earnings.png" alt="iamge">
                <h4> Earning From First Day </h4>
                <p>Very easily you can earn here from first day.Your account is always secure here.</p>
            </div>
            <div>
                <img src="/public/website/images/process.png" alt="iamge">
                <h4>Very Simple System</h4>
                <p>You can do this work by using your android phone and the teaching system is very simple here.</p>
            </div>

        </div>
    </div>
</section>

<section id="faq" class="py-5">
    <div class="container">
        <div class="p-4">
            <h2 class="text-center">COMMON ASKING QUESTIONS</h2>
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne"      aria-expanded="true" aria-controls="collapseOne">
                        What Kinds of Requirements  Can Be Wanted to Do This Work?
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      <p>Only you need an android phone or a laptop and proper internet connection.Otherwise there is nothing more requirements you will need.</p>
                    </div>
                  </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0" data-toggle="collapse" data-target="#collapseTwo"      aria-expanded="true" aria-controls="collapseTwo">
                        Is There Any Fees to This Company?
                      </h5>
                    </div>
                
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        <p>There is a training session for new members that will be held for 3 months.For this reason our company has fixed a few amount of money as an admission fees that is only for one time.
                        </p>
                      </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0" data-toggle="collapse" data-target="#collapseThree"      aria-expanded="true" aria-controls="collapseThree">
                        Do We Need to Go To Any Workplace to Do This Work?
                      </h5>
                    </div>
                
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                        <p>No,you don’t need to go to any workplace or office.You can do this work staying your comfort zone from your home</p>
                      </div>
                    </div>
                </div>
                
          </div>
        </div>
    </div>
</section>

@endsection
@section('script')
    
@endsection
    