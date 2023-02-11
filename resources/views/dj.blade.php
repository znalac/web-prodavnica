@section('title')
    DJ
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
 
    <div class="row">
        <div class="col-lg-12">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach( $dj_banner as $banner )
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} "  data-interval="3000">
                        <img src="/images/{{ $banner->image}}" class="d-block w-100 img-fluid" alt="..." height="600" >
                        
                    </div>
                    @endforeach
                </div>
      
            </div>
               
                  
                </div>
              </div> 
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <p class="mt-3 p-1">
                        Since 2015 Ellen has been Djing and perfected her skills within this passion. 
                        Techno is a great every-day inspiration and is the style of choice performed as well as produced.
                        With previous engagement within the event managing and promotion of techno events.

                    </p>
                    <button type="button" class="smb" data-toggle="modal" data-target="#exampleModal">
                       Social media
                      </button>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Social media</h5>
                              
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="social-modal">
                  
                                            <a href="https://www.facebook.com/EllenRaLinde/"><i class="fa fa-facebook-official" aria-hidden="true"></i>
                                            </a>
                                            <a href="https://www.instagram.com/accounts/login/?next=/p/BGcwV62waR1/"><i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                            <a href="https://www.youtube.com/channel/UCDAu36uYgIsGSpvH0zl7aRQ/videos"><i class="fa fa-youtube-play" aria-hidden="true"></i>
                                            </a>
                                            <a href="https://soundcloud.com/user-943156241"><i class="fa fa-soundcloud" aria-hidden="true"></i>
                                            </a>
                                    </div>
                                    </div>
                                    <div class="col-sm-1">
                                      <i class="fa fa-envelope" aria-hidden="true">mikaelsdotterellen@gmail.com</i> 
                                      
                                      </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="smb" data-dismiss="modal">Close</button>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                      
                </div>
            </div>
            <div class="row justify-content-center mt-3">
  
                <iframe width="560" height="315" src="https://www.youtube.com/embed/mRq-gy4xdr8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              
            </div>
        </div>
@endsection