<div class="col-md-3" id="js-side-bar">
	<div class="sidebar-wrap">
		<div class="side search-wrap animate-box">
			<h3 class="sidebar-heading">{{ __('user/layout.side_bar.find_your_hotel') }}</h3>
			<form method="post" class="colorlib-form">
				<!-- Search City -->
            	<div class="row">
            		@include('user/layout/city')
              		<div class="col-md-12">
                		<div class="form-group">
                  			<label for="date">{{ __('user/layout.side_bar.check_in') }}</label>
                  			<div class="form-field">
                    		<i class="icon icon-calendar2"></i>
                    		<input id="startDate" class="form-control" placeholder="Check-in date" value="" name="date_checkin">
                    		<span class="invalid-feedback" role="alert" id="js-feedback-date_checkin">
                        		<strong id="js-error-date_checkin"></strong>
                    		</span>
                  		</div>
                	</div>
              	</div>
              	<div class="col-md-12">
                	<div class="form-group">
                  		<label for="date">{{ __('user/layout.side_bar.check_out') }}</label>
                  		<div class="form-field">
                			<i class="icon icon-calendar2"></i>
                			<input id="endDate" class="form-control" placeholder="Check-out date" value=""
                			name="date_checkout">
                			<span class="invalid-feedback" role="alert" id="js-feedback-date_checkout">
                        		<strong id="js-error-date_checkout"></strong>
                    		</span>
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
	                    <span class="invalid-feedback" role="alert" id="js-feedback-people">
                    		<strong id="js-error-people"></strong>
                		</span>
                  	</div>
                </div>
              	</div>
              		<div class="col-md-12">
                		<input type="submit" name="submit" id="js-city-search" value="{{ __('user/layout.side_bar.submit') }}" class="btn btn-primary btn-block">
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
	                      	<option value="#" selected>{{ Config::get('user_define.side_bar.price_from_default') }}</option>
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
	                      	<option value="#" selected>{{ Config::get('user_define.side_bar.price_to_default') }}</option>
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
