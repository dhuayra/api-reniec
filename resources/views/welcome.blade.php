<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ asset('assets/css/sb-admin-2.css') }}">


</head>

<body>
    @php
        //decode response
        if (isset($response)) {
            $responseDecode  = json_decode($response);
        }
    @endphp
    <div class="container">

        <div id="content">
            <div class="text-center bg-white topbar mb-4 shadow">
                <h4 class="mt-5 py-3 font-weight-bold text-primary">
                    {{ __('Example for Integrated API DEV') }}
                </h4>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 ">
                        <div class="card border-left-info shadow h-100 px-3 py-3">
                            <form action="{{ route('document.dni') }}" method="GET" class="card-body">
                                <div class="form-group">
                                    <label for="" class="form-label">Token API DEV</label>
                                    <input type="text" name="token" class="form-control form-control-sm" >
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">DNI Number</label>
                                    <input type="text" name="number" class="form-control form-control-sm" >
                                </div>
                                <button type="submit" class="btn btn-sm- btn-info">{{ __('Search') }}</button>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 px-2 py-2">
                            <div class="card-body">
                                @if (isset($response))
                                    @if ($responseDecode->success)
                                        <div class="font-weight-bold">{{ __('Status: ') }}
                                            <span class="text-success">{{ __('true') }}</span>
                                        </div>
                                        <div class="font-weight-bold">{{ __('Data:') }}</div>
                                        <div class="border p-1 bg-gray-200">
                                            <pre>{{ json_encode($responseDecode->data, JSON_PRETTY_PRINT) }}</pre>
                                        </div>
                                    @else
                                        <div class="font-weight-bold">{{ __('Status: ') }}
                                            <span class="text-danger">{{ __('false') }}</span>
                                        </div>
                                        <div class="font-weight-bold">{{__('Message')}}
                                            <span class="text-danger font-weight-normal">{{ $responseDecode->message}}</span>
                                        </div>
                                    @endif                                
                                @else
                                    <div class="text-center">
                                        <p>Response here</p>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                    @if ( isset($error))
                    <div class="col-md-12">
                        <div class="card border-warning">
                            <div class="card-body">
                                <div class="font-weight-bold text-danger">
                                    Error: 
                                    <span class="font-weight-normal">{{$error}}</span>
                                </div>
                            </div>
                        </div>
                    </div>    
                    @endif                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>
