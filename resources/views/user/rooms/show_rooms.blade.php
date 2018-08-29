@extends('user/layout/index')

@section('content')
<div class="col-md-9">
    <div class="row">
        <div class="col-md-12">
            <div class="wrap-division">
                <div class="col-md-12 col-md-offset-0 heading2 animate-box">
                    <h2>Hotel Edison</h2>
                </div>
                <div class="row">
                    <div class="col-md-12 animate-box">
                        <div class="room-wrap">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="room-img" style="background-image: url(user/images/room-1.jpg);"></div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="desc">
                                        <h2>Family Room</h2>
                                        <p class="price"><span>$45</span> <small>/ night</small></p>
                                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                        <p><a href="#" class="btn btn-primary">Book Now!</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 animate-box">
                        <div class="room-wrap">
                            <div class="row">
                                <form action="/action_page.php">
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Send</button>
                    </form>
                    <!-- Comment from user -->
                    <div class="form-group">
                        <label for="comment">Admin</label>
                        <textarea class="form-control" rows="5" id="comment" name="text">A small river named Duden flows by their place and supplies it with the necessary regelialia.</textarea>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                    

            </div>
        </div>
    </div>
</div>
@endsection
