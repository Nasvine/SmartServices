@extends('admin.layouts.admin')

@php
  use App\Models\User;
@endphp

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
                Messages</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dash') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('messages.client.index') }}">Message</a></li>
              <li class="breadcrumb-item active">Acceuil</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5>Nouveaux messages</h5>
                </div>
                  @foreach ($messages as $message)
                    <div class="card-body">
                      <div class="row">
                        <div class="col-xxl-12 col-md-12" style="background-color: rgb(230, 230, 230)">
                          <div class="prooduct-details-box">                                 
                            <div class="media"><img class="align-self-center img-fluid img-60" src="{{-- {{asset('utilisateurs/images/image_profile/'.User::Find($message->user_id)->profile->photo )}} --}}" alt="#">
                              <div class="media-body ms-3">
                                <div class="product-name">
                                  <h6><a href="#"> <u>Type de notification :</u>  {{ $message->type_de_notification }}</a></h6>
                                </div>
                                <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                <div class="price d-flex"> 
                                  <div class="text-muted me-2"><u>Message:</u></div>  {{ $message->message }}
                                </div>
                                <div class="avaiabilty">
                                  <div class="text-success">{{ $message->status }}</div>
                                </div>
                                <a class="btn btn-primary btn-xs" href="#">{{ $message->created_at }}</a><a href="{{ route('messages.client.delete_message', $message->id) }}" {{-- target="_blank" --}} rel="noopener noreferrer"><i class="close" data-feather="x"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach  
              </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection