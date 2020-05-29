@extends('fronEnd.master')

@section('title')
Shipping
@endsection

@section('mainContent')
<hr/>
<div class="container">
	<div class="row">
		<div class="col-md-12"> 
			<div class="well lead text-center text-success">
				{{Session::get('customer_name')}}  please provide shipping info.
			</div>
		</div>
	</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
         <h3 class="text-center"> Shipping Form Info</h3>
         <hr/>
         <div class="well box box-primary">
            <form action = "{{url('save/shipping_info')}}" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="full_name"  class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                    <div class="col-md-6">
                        <input class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ $customer->firstname.' '.$customer->lastname }}" type="text">

                        @error('full_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$customer->email}}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                    <div class="col-md-6">
                        <textarea name = "address" class="form-control">{{$customer->address}}</textarea>

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phoneNumber" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                    <div class="col-md-6">
                        <input id="phoneNumber" type="number" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{$customer->phoneNumber}}" required autocomplete="phoneNumber" autofocus>

                        @error('phoneNumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">District Name</label>

                    <select class="form group col-sm-6" name="districtName">
                        <option>{{$customer->districtName}}</option>
                    </select>
                </div>

                <div class="form-group row mb-6">
                    <div class="col-md-12 offset-md-10">
                        <button type="submit" class="btn btn-primary btn-block">
                            <b>{{ __('Submit') }}</b>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
@endsection