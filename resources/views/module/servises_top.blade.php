<div class="container-fluid" style="height: 40px; border: 1px solid rgb(241, 241, 241)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-md-12 col-sm-12 d-none d-sm-block" style="height: 10px">
                <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; background: lightskyblue; padding: 9px 9px 0px 10px">
                    <i class="far fa-clock" style="opacity: 0.5"></i>
                    <span style="margin-top: -3px; font-size: 10px">Sunday, March 25, 2019</span>
                </div>
                <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; padding: 9px 9px 0px 10px">
                    <i class="fas fa-cloud-sun-rain" style="opacity: 0.5"></i>
                    <span style="margin-top: -3px; font-size: 10px">20 C- Sydney</span>
                </div>
                <span style="width: 1px; height: 30px; border: 0.5px solid rgb(241, 241, 241)"></span>
                @if(Auth::guard()->check())

                @else
                    <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; padding: 9px 9px 0px 10px">
                        <i class="fas fa-user-lock" style="opacity: 0.5"></i>
                        <span style="margin-top: -3px; font-size: 10px">Sign Up</span>
                    </div>
                    <span style="width: 1px; height: 30px; border: 0.5px solid rgb(241, 241, 241)"></span>
                    <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; padding: 9px 9px 0px 10px">
                        <i class="fas fa-user-plus" style="opacity: 0.5"></i>
                        <span style="margin-top: -3px; font-size: 10px">Sign In</span>
                    </div>
                    <span style="width: 1px; height: 30px; border: 0.5px solid rgb(241, 241, 241)"></span>
                    <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; padding: 9px 9px 0px 10px">
                        <i class="fas fa-id-card" style="opacity: 0.5"></i>
                        <span style="margin-top: -3px; font-size: 10px">Contact</span>
                    </div>
                    <span style="width: 1px; height: 30px; border: 0.5px solid rgb(241, 241, 241)"></span>
                @endif
            </div>
        </div>
    </div>
</div>

