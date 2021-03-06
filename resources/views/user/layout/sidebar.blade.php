<div class="col-md-3">
	<div class="sidebar-wrap">

		<div class="side animate-box">
			<div class="row">
				<div class="col-md-12">
					<h3 class="sidebar-heading">{{ __('user/layout.side_bar.local') }}</h3>
					<form method="post" class="colorlib-form-2">
					    <div class="col-10">
    						<input class="form-control" type="search" name="country" id="example-search-input" placeholder="{{ __('user/layout.side_bar.country') }}">
  						</div>
  						<div class="col-10">
    						<input class="form-control" type="search" name="city" id="example-search-input" placeholder="{{ __('user/layout.side_bar.city') }}">
  						</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="side search-wrap animate-box">
			<h3 class="sidebar-heading">{{ __('user/layout.side_bar.find_your_hotel') }}</h3>
			<form method="post" class="colorlib-form">
            	<div class="row">
              		<div class="col-md-12">
                		<div class="form-group">
                  			<label for="date">{{ __('user/layout.side_bar.check_in') }}</label>
                  			<div class="form-field">
                    		<i class="icon icon-calendar2"></i>
                    		<input type="text" id="date" class="form-control date" placeholder="Check-in date">
                  		</div>
                	</div>
              	</div>
              	<div class="col-md-12">
                	<div class="form-group">
                  		<label for="date">{{ __('user/layout.side_bar.check_out') }}</label>
                  		<div class="form-field">
                			<i class="icon icon-calendar2"></i>
                			<input type="text" id="date" class="form-control date" placeholder="Check-out date">
              			</div>
                	</div>
              	</div>
              	<div class="col-md-12">
                	<div class="form-group">
                  		<label for="guests">{{ __('user/layout.side_bar.guest') }}</label>
                  		<div class="form-field">
                    	<i class="icon icon-arrow-down3"></i>
	                    <select name="people" id="people" class="form-control">
		                    <option value="1" style="color: blue;">{{ Config::get('user_define.side_bar.one_person') }}</option>
		                    <option value="2" style="color: blue;">{{ Config::get('user_define.side_bar.two_people') }}</option>
		                    <option value="3" style="color: blue;">{{ Config::get('user_define.side_bar.three_people') }}</option>
		                    <option value="4" style="color: blue;">{{ Config::get('user_define.side_bar.four_people') }}</option>
		                    <option value="5" style="color: blue;">{{ Config::get('user_define.side_bar.five_people_plus') }}</option>
	                    </select>
                  	</div>
                </div>
              	</div>
              		<div class="col-md-12">
                		<input type="submit" name="submit" id="submit" value="{{ __('user/layout.side_bar.submit') }}" class="btn btn-primary btn-block">
              		</div>
            	</div>
          	</form>
		</div>

		<div class="side animate-box">
			<div class="row">
				<div class="col-md-12">
					<h3 class="sidebar-heading">{{ __('user/layout.side_bar.price_range') }}</h3>
					<form method="post" class="colorlib-form-2">
	              	<div class="row">
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="guests">{{ __('user/layout.side_bar.price_from') }}</label>
	                    <div class="form-field">
	                      <i class="icon icon-arrow-down3"></i>
	                      <select name="people" id="people" class="form-control">
	                        <option value="#">{{ Config::get('user_define.side_bar.price_from_1') }}</option>
	                        <option value="#">{{ Config::get('user_define.side_bar.price_from_2') }}</option>
	                        <option value="#">{{ Config::get('user_define.side_bar.price_from_3') }}</option>
	                        <option value="#">{{ Config::get('user_define.side_bar.price_from_4') }}</option>
	                        <option value="#">{{ Config::get('user_define.side_bar.price_from_5') }}</option>
	                      </select>
	                    </div>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="guests">{{ __('user/layout.side_bar.price_to') }}</label>
	                    <div class="form-field">
	                      <i class="icon icon-arrow-down3"></i>
	                      <select name="people" id="people" class="form-control">
	                        <option value="#">{{ Config::get('user_define.side_bar.price_to_1') }}</option>
	                        <option value="#">{{ Config::get('user_define.side_bar.price_to_2') }}</option>
	                        <option value="#">{{ Config::get('user_define.side_bar.price_to_3') }}</option>
	                        <option value="#">{{ Config::get('user_define.side_bar.price_to_4') }}</option>
	                        <option value="#">{{ Config::get('user_define.side_bar.price_to_5') }}</option>
	                      </select>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </form>
            </div>
			</div>
		</div>

		<div class="side animate-box">
			<div class="row">
				<div class="col-md-12">
					<h3 class="sidebar-heading">{{ __('user/layout.side_bar.review_rating') }}</h3>
					<form method="post" class="colorlib-form-2">
					   <div class="form-check">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">
								<p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
							</label>
					   </div>
					   <div class="form-check">
					      <input type="checkbox" class="form-check-input" id="exampleCheck1">
					      <label class="form-check-label" for="exampleCheck1">
					    	   <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
					      </label>
					   </div>
					   <div class="form-check">
					      <input type="checkbox" class="form-check-input" id="exampleCheck1">
					      <label class="form-check-label" for="exampleCheck1">
					      	<p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
					     </label>
					   </div>
					   <div class="form-check">
					      <input type="checkbox" class="form-check-input" id="exampleCheck1">
					      <label class="form-check-label" for="exampleCheck1">
					      	<p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
					     </label>
					   </div>
					   <div class="form-check">
					      <input type="checkbox" class="form-check-input" id="exampleCheck1">
					      <label class="form-check-label" for="exampleCheck1">
					      	<p class="rate"><span><i class="icon-star-full"></i></span></p>
					     </label>
					   </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
