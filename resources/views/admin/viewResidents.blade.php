@extends('layout.dashboard-layout')

@section('content')
 <a href="javascript:window.print()" class="btn btn-success "><i class="fas fa-print"></i></a>
   {{-- <img class="img-view"src="{{$resident->resident_image ? asset ('storage/' .$resident->resident_image) : asset('/storage/images/-image.png')}}" alt=""  />				 --}}
    <div class="container">
      <div id="content" class="content p-0">
        <div class="profile-header">
          <div class="profile-header-content">
            <img class="img-view"src="{{$resident->resident_image ? asset ('storage/' .$resident->resident_image) : asset('/storage/images/-image.png')}}" alt=""  />			
              <div class="profile-header-info">
                <h4 class="m-t-sm">{{$resident->first_name}} {{$resident->last_name}}</h4>
              </div>
          </div>
        </div>
        <div class="profile-container">
          <div class="row row-space-20">
            <div class="col-md-8">
              <div class="tab-content p-0">
                <div class="tab-pane active show" id="profile-about">
                  <table class="table table-profile">
                  </table>
                    <table class="table table-profile">
                      <thead>
                        <tr>
                         <th colspan="2">BASIC INFORMATION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                         <td class="field">First name</td>
                          <td class="value">
                           {{$resident->first_name}}
                          </td>
                        </tr>
                        <tr>
                          <td class="field">Middle Name</td>
                          <td class="value">
                            {{$resident->middle_name}}
                          </td>
                        </tr>
                        <tr>
                          <td class="field">Last Name</td>
                          <td class="value">
                           {{$resident->last_name}}
                          </td>
                        </tr>
                        <tr>
                          <td class="field">Nickname</td>
                          <td class="value">
                            {{$resident->nickname}}
                          </td>
                        </tr>
                        <tr>
                          <td class="field">Gender</td>
                          <td class="value">
                            {{$resident->gender}}
                          </td>
                        </tr>
                        <tr>
                          <td class="field">Age</td>
                          <td class="value">
                            {{$resident->age}}
                          </td>
                        </tr>
                        <tr>
                          <td class="field">Birthdate</td>
                          <td class="value">
                            {{$resident->birthdate}}
                          </td>
                        </tr>
                     </tbody>
                </table>
                <table class="table table-profile">
                  <thead>
                    <tr>
                     <th colspan="2">CONTACT INFORMATION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                     <td class="field">Contact Number</td>
                     <td class="value">
                      {{$resident->phone_number}}
                     </td>
                    </tr>
                    <tr>
                     <td class="field">Email</td>
                     <td class="value">
                      {{$resident->email}}
                     </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          {{-- <div class="col-md-4 hidden-xs hidden-sm">
            <ul class="profile-info-list">
             <li class="title">PERSONAL INFORMATION</li>
             <li>
                <div class="field">Occupation:</div>
                <div class="value"> {{$resident->occupation}}</div>
             </li>
             <li>
                <div class="field">Birth of Date:</div>
                <div class="value"> {{$resident->birthdate}}</div>
             </li>
             <li>
                <div class="field">Country:</div>
                <div class="value">San Francisco</div>
             </li>
             <li>
                <div class="field">Phone No.:</div>
                <div class="value">
                 (123) 456-7890
                </div>
             </li>
            </ul>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection