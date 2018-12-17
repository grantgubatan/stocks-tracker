@extends('layouts.app')

@section('content')
<style media="screen">
select {
  -webkit-appearance: none;
  -moz-appearance: none;
  text-indent: 1px;
  text-overflow: '';
}
</style>
<div class="container page-wrapper chiller-theme toggled">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
        <div class="">
          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                          <h1 class="blue-header"> <i data-feather="users"></i> My Profile</h1>
                          <h3>{{Auth::user()->client->salutation}}. {{Auth::user()->client->fullname}}</h3>
                          <div>
                            <!-- Button trigger modal -->
                            <a href="#" data-toggle="modal" data-target="#changPasswordModal" style="text-decoration:underline;">
                              Change Password
                            </a>
                            @include('partials.user.changepassword')
                          </div>
                          <hr>
                          <h6><b>Date Added</b> {{ \Carbon\Carbon::parse(Auth::user()->client->created_at)->format('m/d/Y')}}</h6>
                          <h6>{{Auth::user()->client->created_at->diffForHumans()}}</h6>
                          <hr>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <form action="{{url('client-edit')}}" method="POST">
                            @csrf
                                <input type="hidden" name="id" value="{{Auth::user()->client->id}}">
                                <div class="row">
                                  <div class="col">
                                    <label for="name" class="col-4 col-form-label">Full Name</label>
                                    <div class="col-8">
                                      <input id="name" name="fullname" placeholder="Full Name" class="form-control here" type="text" value="{{Auth::user()->client->fullname}}" disabled>
                                    </div>
                                  </div>

                                  <div class="col">
                                    <label for="email" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                      <input id="name" name="email" placeholder="Email" class="form-control here" type="text" value="{{Auth::user()->client->email}}" disabled>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col">
                                    <label for="email" class="col-4 col-form-label">Alternative Email</label>
                                    <div class="col-8">
                                      <input id="name" name="email2" placeholder="Alternative Email" class="form-control here" type="text" value="{{Auth::user()->client->email2}}" disabled>
                                    </div>
                                  </div>

                                  <div class="col">
                                    <label for="email" class="col-4 col-form-label">Phone Number</label>
                                    <div class="col-8">
                                      <input id="name" name="phone" placeholder="Phone Number" class="form-control here" type="text" value="{{Auth::user()->client->phone}}" disabled>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col">
                                    <label for="email" class="col-4 col-form-label">Alternative Phone Number</label>
                                    <div class="col-8">
                                      <input id="name" name="phone2" placeholder="Alternative Phone Number" class="form-control here" type="text" value="{{Auth::user()->client->phone2}}" disabled>
                                    </div>
                                  </div>

                                  <div class="col">
                                    <label for="email" class="col-4 col-form-label">Country</label>
                                    <div class="col-8">
                                      <select class="form-control" name="country" disabled required>
                                        <option value="">Select Country</option>
                                        <option value="Afghanistan" {{ ( Auth::user()->client->country == 'Afghanistan') ? 'selected' : '' }}>Afghanistan</option>
                                        <option value="Åland Islands" {{ ( Auth::user()->client->country == 'Åland Islands') ? 'selected' : '' }}>Åland Islands</option>
                                        <option value="Albania" {{ ( Auth::user()->client->country == 'Albania') ? 'selected' : '' }}>Albania</option>
                                        <option value="Algeria" {{ ( Auth::user()->client->country == 'Algeria') ? 'selected' : '' }}>Algeria</option>
                                        <option value="American Samoa" {{ ( Auth::user()->client->country == 'American Samoa') ? 'selected' : '' }}>American Samoa</option>
                                        <option value="Andorra" {{ ( Auth::user()->client->country == 'Andorra') ? 'selected' : '' }}>Andorra</option>
                                        <option value="Angola" {{ ( Auth::user()->client->country == 'Angola') ? 'selected' : '' }}>Angola</option>
                                        <option value="Anguilla" {{ ( Auth::user()->client->country == 'Anguilla') ? 'selected' : '' }}>Anguilla</option>
                                        <option value="Antarctica" {{ ( Auth::user()->client->country == 'Antarctica') ? 'selected' : '' }}>Antarctica</option>
                                        <option value="Antigua and Barbuda" {{ ( Auth::user()->client->country == 'Antigua and Barbuda') ? 'selected' : '' }}>Antigua and Barbuda</option>
                                        <option value="Argentina" {{ ( Auth::user()->client->country == 'Argentina') ? 'selected' : '' }}>Argentina</option>
                                        <option value="Armenia" {{ ( Auth::user()->client->country == 'Armenia') ? 'selected' : '' }}>Armenia</option>
                                        <option value="Aruba" {{ ( Auth::user()->client->country == 'Aruba') ? 'selected' : '' }}>Aruba</option>
                                        <option value="Australia" {{ ( Auth::user()->client->country == 'Australia') ? 'selected' : '' }}>Australia</option>
                                        <option value="Austria" {{ ( Auth::user()->client->country == 'Austria') ? 'selected' : '' }}>Austria</option>
                                        <option value="Azerbaijan" {{ ( Auth::user()->client->country == 'Azerbaijan') ? 'selected' : '' }}>Azerbaijan</option>
                                        <option value="Bahamas" {{ ( Auth::user()->client->country == 'Bahamas') ? 'selected' : '' }}>Bahamas</option>
                                        <option value="Bahrain" {{ ( Auth::user()->client->country == 'Bahrain') ? 'selected' : '' }}>Bahrain</option>
                                        <option value="Bangladesh" {{ ( Auth::user()->client->country == 'Bangladesh') ? 'selected' : '' }}>Bangladesh</option>
                                        <option value="Barbados" {{ ( Auth::user()->client->country == 'Barbados') ? 'selected' : '' }}>Barbados</option>
                                        <option value="Belarus" {{ ( Auth::user()->client->country == 'Belarus') ? 'selected' : '' }}>Belarus</option>
                                        <option value="Belgium" {{ ( Auth::user()->client->country == 'Belgium') ? 'selected' : '' }}>Belgium</option>
                                        <option value="Belize" {{ ( Auth::user()->client->country == 'Belize') ? 'selected' : '' }}>Belize</option>
                                        <option value="Benin" {{ ( Auth::user()->client->country == 'Benin') ? 'selected' : '' }}>Benin</option>
                                        <option value="Bermuda" {{ ( Auth::user()->client->country == 'Bermuda') ? 'selected' : '' }}>Bermuda</option>
                                        <option value="Bhutan" {{ ( Auth::user()->client->country == 'Bhutan') ? 'selected' : '' }}>Bhutan</option>
                                        <option value="Bolivia" {{ ( Auth::user()->client->country == 'Bolivia') ? 'selected' : '' }}>Bolivia</option>
                                        <option value="Bosnia and Herzegovina" {{ ( Auth::user()->client->country == 'Bosnia and Herzegovina') ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                                        <option value="Botswana" {{ ( Auth::user()->client->country == 'Botswana') ? 'selected' : '' }}>Botswana</option>
                                        <option value="Bouvet Island" {{ ( Auth::user()->client->country == 'Bouvet Island') ? 'selected' : '' }}>Bouvet Island</option>
                                        <option value="Brazil" {{ ( Auth::user()->client->country == 'Brazil') ? 'selected' : '' }}>Brazil</option>
                                        <option value="British Indian Ocean Territory" {{ ( Auth::user()->client->country == 'British Indian Ocean Territory') ? 'selected' : '' }}>British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam" {{ ( Auth::user()->client->country == 'Brunei Darussalam') ? 'selected' : '' }}>Brunei Darussalam</option>
                                        <option value="Bulgaria" {{ ( Auth::user()->client->country == 'Bulgaria') ? 'selected' : '' }}>Bulgaria</option>
                                        <option value="Burkina Faso" {{ ( Auth::user()->client->country == 'Burkina Faso') ? 'selected' : '' }}>Burkina Faso</option>
                                        <option value="Burundi" {{ ( Auth::user()->client->country == 'Burundi') ? 'selected' : '' }}>Burundi</option>
                                        <option value="Cambodia" {{ ( Auth::user()->client->country == 'Cambodia') ? 'selected' : '' }}>Cambodia</option>
                                        <option value="Cameroon" {{ ( Auth::user()->client->country == 'Cameroon') ? 'selected' : '' }}>Cameroon</option>
                                        <option value="Canada" {{ ( Auth::user()->client->country == 'Canada') ? 'selected' : '' }}>Canada</option>
                                        <option value="Cape Verde" {{ ( Auth::user()->client->country == 'Cape Verde') ? 'selected' : '' }}>Cape Verde</option>
                                        <option value="Cayman Islands" {{ ( Auth::user()->client->country == 'Cayman Islands') ? 'selected' : '' }}>Cayman Islands</option>
                                        <option value="Central African Republic" {{ ( Auth::user()->client->country == 'Central African Republic') ? 'selected' : '' }}>Central African Republic</option>
                                        <option value="Chad" {{ ( Auth::user()->client->country == 'Chad') ? 'selected' : '' }}>Chad</option>
                                        <option value="Chile" {{ ( Auth::user()->client->country == 'Chile') ? 'selected' : '' }}>Chile</option>
                                        <option value="China" {{ ( Auth::user()->client->country == 'China') ? 'selected' : '' }}>China</option>
                                        <option value="Christmas Island" {{ ( Auth::user()->client->country == 'Christmas Island') ? 'selected' : '' }}>Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands" {{ ( Auth::user()->client->country == 'Cocos (Keeling) Islands') ? 'selected' : '' }}>Cocos (Keeling) Islands</option>
                                        <option value="Colombia" {{ ( Auth::user()->client->country == 'Colombia') ? 'selected' : '' }}>Colombia</option>
                                        <option value="Comoros" {{ ( Auth::user()->client->country == 'Comoros') ? 'selected' : '' }}>Comoros</option>
                                        <option value="Congo" {{ ( Auth::user()->client->country == 'Congo') ? 'selected' : '' }}>Congo</option>
                                        <option value="Congo, The Democratic Republic of The" {{ ( Auth::user()->client->country == 'Congo, The Democratic Republic of The') ? 'selected' : '' }}>Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands" {{ ( Auth::user()->client->country == 'Cook Islands') ? 'selected' : '' }}>Cook Islands</option>
                                        <option value="Costa Rica" {{ ( Auth::user()->client->country == 'Costa Rica') ? 'selected' : '' }}>Costa Rica</option>
                                        <option value="Cote D'ivoire" {{ ( Auth::user()->client->country == 'Cote D\'ivoire') ? 'selected' : '' }}>Cote D'ivoire</option>
                                        <option value="Croatia" {{ ( Auth::user()->client->country == 'Croatia') ? 'selected' : '' }}>Croatia</option>
                                        <option value="Cuba" {{ ( Auth::user()->client->country == 'Cuba') ? 'selected' : '' }}>Cuba</option>
                                        <option value="Cyprus" {{ ( Auth::user()->client->country == 'Cyprus') ? 'selected' : '' }}>Cyprus</option>
                                        <option value="Czech Republic" {{ ( Auth::user()->client->country == 'Czech Republic') ? 'selected' : '' }}>Czech Republic</option>
                                        <option value="Denmark" {{ ( Auth::user()->client->country == 'Denmark') ? 'selected' : '' }}>Denmark</option>
                                        <option value="Djibouti" {{ ( Auth::user()->client->country == 'Djibouti') ? 'selected' : '' }}>Djibouti</option>
                                        <option value="Dominica" {{ ( Auth::user()->client->country == 'Dominica') ? 'selected' : '' }}>Dominica</option>
                                        <option value="Dominican Republic" {{ ( Auth::user()->client->country == 'Dominican Republic') ? 'selected' : '' }}>Dominican Republic</option>
                                        <option value="Ecuador" {{ ( Auth::user()->client->country == 'Ecuador') ? 'selected' : '' }}>Ecuador</option>
                                        <option value="Egypt" {{ ( Auth::user()->client->country == 'Egypt') ? 'selected' : '' }}>Egypt</option>
                                        <option value="El Salvador" {{ ( Auth::user()->client->country == 'El Salvador') ? 'selected' : '' }}>El Salvador</option>
                                        <option value="Equatorial Guinea" {{ ( Auth::user()->client->country == 'Equatorial Guinea') ? 'selected' : '' }}>Equatorial Guinea</option>
                                        <option value="Eritrea" {{ ( Auth::user()->client->country == 'Eritrea') ? 'selected' : '' }}>Eritrea</option>
                                        <option value="Estonia" {{ ( Auth::user()->client->country == 'Estonia') ? 'selected' : '' }}>Estonia</option>
                                        <option value="Ethiopia" {{ ( Auth::user()->client->country == 'Ethiopia') ? 'selected' : '' }}>Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)" {{ ( Auth::user()->client->country == 'Faroe Islands') ? 'selected' : '' }}>Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands" {{ ( Auth::user()->client->country == 'Faroe Islands') ? 'selected' : '' }}>Faroe Islands</option>
                                        <option value="Fiji" {{ ( Auth::user()->client->country == 'Fiji') ? 'selected' : '' }}>Fiji</option>
                                        <option value="Finland" {{ ( Auth::user()->client->country == 'Finland') ? 'selected' : '' }}>Finland</option>
                                        <option value="France" {{ ( Auth::user()->client->country == 'France') ? 'selected' : '' }}>France</option>
                                        <option value="French Guiana" {{ ( Auth::user()->client->country == 'French Guiana') ? 'selected' : '' }}>French Guiana</option>
                                        <option value="French Polynesia" {{ ( Auth::user()->client->country == 'French Polynesia') ? 'selected' : '' }}>French Polynesia</option>
                                        <option value="French Southern Territories" {{ ( Auth::user()->client->country == 'French Southern Territories') ? 'selected' : '' }}>French Southern Territories</option>
                                        <option value="Gabon" {{ ( Auth::user()->client->country == 'Gabon') ? 'selected' : '' }}>Gabon</option>
                                        <option value="Gambia" {{ ( Auth::user()->client->country == 'Gambia') ? 'selected' : '' }}>Gambia</option>
                                        <option value="Georgia" {{ ( Auth::user()->client->country == 'Georgia') ? 'selected' : '' }}>Georgia</option>
                                        <option value="Germany" {{ ( Auth::user()->client->country == 'Germany') ? 'selected' : '' }}>Germany</option>
                                        <option value="Ghana" {{ ( Auth::user()->client->country == 'Ghana') ? 'selected' : '' }}>Ghana</option>
                                        <option value="Gibraltar" {{ ( Auth::user()->client->country == 'Gibraltar') ? 'selected' : '' }}>Gibraltar</option>
                                        <option value="Greece" {{ ( Auth::user()->client->country == 'Greece') ? 'selected' : '' }}>Greece</option>
                                        <option value="Greenland" {{ ( Auth::user()->client->country == 'Greenland') ? 'selected' : '' }}>Greenland</option>
                                        <option value="Grenada" {{ ( Auth::user()->client->country == 'Grenada') ? 'selected' : '' }}>Grenada</option>
                                        <option value="Guadeloupe" {{ ( Auth::user()->client->country == 'Guadeloupe') ? 'selected' : '' }}>Guadeloupe</option>
                                        <option value="Guam" {{ ( Auth::user()->client->country == 'Guam') ? 'selected' : '' }}>Guam</option>
                                        <option value="Guatemala" {{ ( Auth::user()->client->country == 'Guatemala') ? 'selected' : '' }}>Guatemala</option>
                                        <option value="Guernsey" {{ ( Auth::user()->client->country == 'Guernsey') ? 'selected' : '' }}>Guernsey</option>
                                        <option value="Guinea" {{ ( Auth::user()->client->country == 'Guinea') ? 'selected' : '' }}>Guinea</option>
                                        <option value="Guinea-bissau" {{ ( Auth::user()->client->country == 'Guinea-bissau') ? 'selected' : '' }}>Guinea-bissau</option>
                                        <option value="Guyana" {{ ( Auth::user()->client->country == 'Guyana') ? 'selected' : '' }}>Guyana</option>
                                        <option value="Haiti" {{ ( Auth::user()->client->country == 'Haiti') ? 'selected' : '' }}>Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands" {{ ( Auth::user()->client->country == 'Heard Island and Mcdonald Islands') ? 'selected' : '' }}>Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)" {{ ( Auth::user()->client->country == 'Holy See (Vatican City State)') ? 'selected' : '' }}>Holy See (Vatican City State)</option>
                                        <option value="Honduras" {{ ( Auth::user()->client->country == 'Honduras') ? 'selected' : '' }}>Honduras</option>
                                        <option value="Hong Kong" {{ ( Auth::user()->client->country == 'Hong Kong') ? 'selected' : '' }}>Hong Kong</option>
                                        <option value="Hungary" {{ ( Auth::user()->client->country == 'Hungary') ? 'selected' : '' }}>Hungary</option>
                                        <option value="Iceland" {{ ( Auth::user()->client->country == 'Iceland') ? 'selected' : '' }}>Iceland</option>
                                        <option value="India" {{ ( Auth::user()->client->country == 'India') ? 'selected' : '' }}>India</option>
                                        <option value="Indonesia" {{ ( Auth::user()->client->country == 'Indonesia') ? 'selected' : '' }}>Indonesia</option>
                                        <option value="Iran, Islamic Republic of" {{ ( Auth::user()->client->country == 'Iran, Islamic Republic of') ? 'selected' : '' }}>Iran, Islamic Republic of</option>
                                        <option value="Iraq" {{ ( Auth::user()->client->country == 'Iraq') ? 'selected' : '' }}>Iraq</option>
                                        <option value="Ireland" {{ ( Auth::user()->client->country == 'Ireland') ? 'selected' : '' }}>Ireland</option>
                                        <option value="Isle of Man" {{ ( Auth::user()->client->country == 'Isle of Man') ? 'selected' : '' }}>Isle of Man</option>
                                        <option value="Israel" {{ ( Auth::user()->client->country == 'Israel') ? 'selected' : '' }}>Israel</option>
                                        <option value="Italy" {{ ( Auth::user()->client->country == 'Italy') ? 'selected' : '' }}>Italy</option>
                                        <option value="Jamaica" {{ ( Auth::user()->client->country == 'Jamaica') ? 'selected' : '' }}>Jamaica</option>
                                        <option value="Japan" {{ ( Auth::user()->client->country == 'Japan') ? 'selected' : '' }}>Japan</option>
                                        <option value="Jersey" {{ ( Auth::user()->client->country == 'Jersey') ? 'selected' : '' }}>Jersey</option>
                                        <option value="Jordan" {{ ( Auth::user()->client->country == 'Jordan') ? 'selected' : '' }}>Jordan</option>
                                        <option value="Kazakhstan" {{ ( Auth::user()->client->country == 'Kazakhstan') ? 'selected' : '' }}>Kazakhstan</option>
                                        <option value="Kenya" {{ ( Auth::user()->client->country == 'Kenya') ? 'selected' : '' }}>Kenya</option>
                                        <option value="Kiribati" {{ ( Auth::user()->client->country == 'Kiribati') ? 'selected' : '' }}>Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of" {{ ( Auth::user()->client->country == 'Korea, Democratic People\'s Republic of') ? 'selected' : '' }}>Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of" {{ ( Auth::user()->client->country == 'Korea, Republic of') ? 'selected' : '' }}>Korea, Republic of</option>
                                        <option value="Kuwait" {{ ( Auth::user()->client->country == 'Kuwait') ? 'selected' : '' }}>Kuwait</option>
                                        <option value="Kyrgyzstan" {{ ( Auth::user()->client->country == 'Kyrgyzstan') ? 'selected' : '' }}>Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic" {{ ( Auth::user()->client->country == 'Lao People\'s Democratic Republic') ? 'selected' : '' }}>Lao People's Democratic Republic</option>
                                        <option value="Latvia" {{ ( Auth::user()->client->country == 'Latvia') ? 'selected' : '' }}>Latvia</option>
                                        <option value="Lebanon" {{ ( Auth::user()->client->country == 'Lebanon') ? 'selected' : '' }}>Lebanon</option>
                                        <option value="Lesotho" {{ ( Auth::user()->client->country == 'Lesotho') ? 'selected' : '' }}>Lesotho</option>
                                        <option value="Liberia" {{ ( Auth::user()->client->country == 'Liberia') ? 'selected' : '' }}>Liberia</option>
                                        <option value="Libyan Arab Jamahiriya" {{ ( Auth::user()->client->country == 'Libyan Arab Jamahiriya') ? 'selected' : '' }}>Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein" {{ ( Auth::user()->client->country == 'Liechtenstein') ? 'selected' : '' }}>Liechtenstein</option>
                                        <option value="Lithuania" {{ ( Auth::user()->client->country == 'Lithuania') ? 'selected' : '' }}>Lithuania</option>
                                        <option value="Luxembourg" {{ ( Auth::user()->client->country == 'Luxembourg') ? 'selected' : '' }}>Luxembourg</option>
                                        <option value="Macao" {{ ( Auth::user()->client->country == 'Macao') ? 'selected' : '' }}>Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of" {{ ( Auth::user()->client->country == 'Macedonia, The Former Yugoslav Republic of') ? 'selected' : '' }}>Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar" {{ ( Auth::user()->client->country == 'Madagascar') ? 'selected' : '' }}>Madagascar</option>
                                        <option value="Malawi" {{ ( Auth::user()->client->country == 'Malawi') ? 'selected' : '' }}>Malawi</option>
                                        <option value="Malaysia" {{ ( Auth::user()->client->country == 'Malaysia') ? 'selected' : '' }}>Malaysia</option>
                                        <option value="Maldives" {{ ( Auth::user()->client->country == 'Maldives') ? 'selected' : '' }}>Maldives</option>
                                        <option value="Mali" {{ ( Auth::user()->client->country == 'Mali') ? 'selected' : '' }}>Mali</option>
                                        <option value="Malta" {{ ( Auth::user()->client->country == 'Malta') ? 'selected' : '' }}>Malta</option>
                                        <option value="Marshall Islands" {{ ( Auth::user()->client->country == 'Marshall Islands') ? 'selected' : '' }}>Marshall Islands</option>
                                        <option value="Martinique" {{ ( Auth::user()->client->country == 'Martinique') ? 'selected' : '' }}>Martinique</option>
                                        <option value="Mauritania" {{ ( Auth::user()->client->country == 'Mauritania') ? 'selected' : '' }}>Mauritania</option>
                                        <option value="Mauritius" {{ ( Auth::user()->client->country == 'Mauritius') ? 'selected' : '' }}>Mauritius</option>
                                        <option value="Mayotte" {{ ( Auth::user()->client->country == 'Mayotte') ? 'selected' : '' }}>Mayotte</option>
                                        <option value="Mexico" {{ ( Auth::user()->client->country == 'Mexico') ? 'selected' : '' }}>Mexico</option>
                                        <option value="Micronesia, Federated States of" {{ ( Auth::user()->client->country == 'Micronesia, Federated States of') ? 'selected' : '' }}>Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of" {{ ( Auth::user()->client->country == 'Moldova, Republic of') ? 'selected' : '' }}>Moldova, Republic of</option>
                                        <option value="Monaco" {{ ( Auth::user()->client->country == 'Monaco') ? 'selected' : '' }}>Monaco</option>
                                        <option value="Mongolia" {{ ( Auth::user()->client->country == 'Mongolia') ? 'selected' : '' }}>Mongolia</option>
                                        <option value="Montenegro" {{ ( Auth::user()->client->country == 'Montenegro') ? 'selected' : '' }}>Montenegro</option>
                                        <option value="Montserrat" {{ ( Auth::user()->client->country == 'Montserrat') ? 'selected' : '' }}>Montserrat</option>
                                        <option value="Morocco" {{ ( Auth::user()->client->country == 'Morocco') ? 'selected' : '' }}>Morocco</option>
                                        <option value="Mozambique" {{ ( Auth::user()->client->country == 'Mozambique') ? 'selected' : '' }}>Mozambique</option>
                                        <option value="Myanmar" {{ ( Auth::user()->client->country == 'Myanmar') ? 'selected' : '' }}>Myanmar</option>
                                        <option value="Namibia" {{ ( Auth::user()->client->country == 'Namibia') ? 'selected' : '' }}>Namibia</option>
                                        <option value="Nauru" {{ ( Auth::user()->client->country == 'Nauru') ? 'selected' : '' }}>Nauru</option>
                                        <option value="Nepal" {{ ( Auth::user()->client->country == 'Nepal') ? 'selected' : '' }}>Nepal</option>
                                        <option value="Netherlands" {{ ( Auth::user()->client->country == 'Netherlands') ? 'selected' : '' }}>Netherlands</option>
                                        <option value="Netherlands Antilles" {{ ( Auth::user()->client->country == 'Netherlands Antilles') ? 'selected' : '' }}>Netherlands Antilles</option>
                                        <option value="New Caledonia" {{ ( Auth::user()->client->country == 'New Caledonia') ? 'selected' : '' }}>New Caledonia</option>
                                        <option value="New Zealand" {{ ( Auth::user()->client->country == 'New Zealand') ? 'selected' : '' }}>New Zealand</option>
                                        <option value="Nicaragua" {{ ( Auth::user()->client->country == 'Nicaragua') ? 'selected' : '' }}>Nicaragua</option>
                                        <option value="Niger" {{ ( Auth::user()->client->country == 'Niger') ? 'selected' : '' }}>Niger</option>
                                        <option value="Nigeria" {{ ( Auth::user()->client->country == 'Nigeria') ? 'selected' : '' }}>Nigeria</option>
                                        <option value="Niue" {{ ( Auth::user()->client->country == 'Niue') ? 'selected' : '' }}>Niue</option>
                                        <option value="Norfolk Island" {{ ( Auth::user()->client->country == 'Norfolk Island') ? 'selected' : '' }}>Norfolk Island</option>
                                        <option value="Northern Mariana Islands" {{ ( Auth::user()->client->country == 'Northern Mariana Islands') ? 'selected' : '' }}>Northern Mariana Islands</option>
                                        <option value="Norway" {{ ( Auth::user()->client->country == 'Norway') ? 'selected' : '' }}>Norway</option>
                                        <option value="Oman" {{ ( Auth::user()->client->country == 'Oman') ? 'selected' : '' }}>Oman</option>
                                        <option value="Pakistan" {{ ( Auth::user()->client->country == 'Pakistan') ? 'selected' : '' }}>Pakistan</option>
                                        <option value="Palau" {{ ( Auth::user()->client->country == 'Palau') ? 'selected' : '' }}>Palau</option>
                                        <option value="Palestinian Territory, Occupied"> {{ ( Auth::user()->client->country == 'Palestinian Territory, Occupied') ? 'selected' : '' }}Palestinian Territory, Occupied</option>
                                        <option value="Panama" {{ ( Auth::user()->client->country == 'Panama') ? 'selected' : '' }}>Panama</option>
                                        <option value="Papua New Guinea" {{ ( Auth::user()->client->country == 'Papua New Guinea') ? 'selected' : '' }}>Papua New Guinea</option>
                                        <option value="Paraguay" {{ ( Auth::user()->client->country == 'Paraguay') ? 'selected' : '' }}>Paraguay</option>
                                        <option value="Peru" {{ ( Auth::user()->client->country == 'Peru') ? 'selected' : '' }}>Peru</option>
                                        <option value="Philippines" {{ ( Auth::user()->client->country == 'Philippines') ? 'selected' : '' }}>Philippines</option>
                                        <option value="Pitcairn" {{ ( Auth::user()->client->country == 'Pitcairn') ? 'selected' : '' }}>Pitcairn</option>
                                        <option value="Poland" {{ ( Auth::user()->client->country == 'Poland') ? 'selected' : '' }}>Poland</option>
                                        <option value="Portugal" {{ ( Auth::user()->client->country == 'Portugal') ? 'selected' : '' }}>Portugal</option>
                                        <option value="Puerto Rico" {{ ( Auth::user()->client->country == 'Puerto Rico') ? 'selected' : '' }}>Puerto Rico</option>
                                        <option value="Qatar" {{ ( Auth::user()->client->country == 'Qatar') ? 'selected' : '' }}>Qatar</option>
                                        <option value="Reunion" {{ ( Auth::user()->client->country == 'Reunion') ? 'selected' : '' }}>Reunion</option>
                                        <option value="Romania" {{ ( Auth::user()->client->country == 'Romania') ? 'selected' : '' }}>Romania</option>
                                        <option value="Russian Federation" {{ ( Auth::user()->client->country == 'Russian Federation') ? 'selected' : '' }}>Russian Federation</option>
                                        <option value="Rwanda" {{ ( Auth::user()->client->country == 'Rwanda') ? 'selected' : '' }}>Rwanda</option>
                                        <option value="Saint Helena" {{ ( Auth::user()->client->country == 'Saint Helena') ? 'selected' : '' }}>Saint Helena</option>
                                        <option value="Saint Kitts and Nevis" {{ ( Auth::user()->client->country == 'Saint Kitts and Nevis') ? 'selected' : '' }}>Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia" {{ ( Auth::user()->client->country == 'Saint Lucia') ? 'selected' : '' }}>Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon" {{ ( Auth::user()->client->country == 'Saint Pierre and Miquelon') ? 'selected' : '' }}>Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines" {{ ( Auth::user()->client->country == 'Saint Vincent and The Grenadines') ? 'selected' : '' }}>Saint Vincent and The Grenadines</option>
                                        <option value="Samoa" {{ ( Auth::user()->client->country == 'Samoa') ? 'selected' : '' }}>Samoa</option>
                                        <option value="San Marino" {{ ( Auth::user()->client->country == 'San Marino') ? 'selected' : '' }}>San Marino</option>
                                        <option value="Sao Tome and Principe" {{ ( Auth::user()->client->country == 'Sao Tome and Principe') ? 'selected' : '' }}>Sao Tome and Principe</option>
                                        <option value="Saudi Arabia" {{ ( Auth::user()->client->country == 'Saudi Arabia') ? 'selected' : '' }}>Saudi Arabia</option>
                                        <option value="Senegal" {{ ( Auth::user()->client->country == 'Senegal') ? 'selected' : '' }}>Senegal</option>
                                        <option value="Serbia" {{ ( Auth::user()->client->country == 'Serbia') ? 'selected' : '' }}>Serbia</option>
                                        <option value="Seychelles" {{ ( Auth::user()->client->country == 'Seychelles') ? 'selected' : '' }}>Seychelles</option>
                                        <option value="Sierra Leone" {{ ( Auth::user()->client->country == 'Sierra Leone') ? 'selected' : '' }}>Sierra Leone</option>
                                        <option value="Singapore" {{ ( Auth::user()->client->country == 'Singapore') ? 'selected' : '' }}>Singapore</option>
                                        <option value="Slovakia" {{ ( Auth::user()->client->country == 'Slovakia') ? 'selected' : '' }}>Slovakia</option>
                                        <option value="Slovenia" {{ ( Auth::user()->client->country == 'Slovenia') ? 'selected' : '' }}>Slovenia</option>
                                        <option value="Solomon Islands" {{ ( Auth::user()->client->country == 'Solomon Islands') ? 'selected' : '' }}>Solomon Islands</option>
                                        <option value="Somalia" {{ ( Auth::user()->client->country == 'Somalia') ? 'selected' : '' }}>Somalia</option>
                                        <option value="South Africa" {{ ( Auth::user()->client->country == 'South Africa') ? 'selected' : '' }}>South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands" {{ ( Auth::user()->client->country == 'South Georgia and The South Sandwich Islands') ? 'selected' : '' }}>South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain" {{ ( Auth::user()->client->country == 'Spain') ? 'selected' : '' }}>Spain</option>
                                        <option value="Sri Lanka" {{ ( Auth::user()->client->country == 'Sri Lanka') ? 'selected' : '' }}>Sri Lanka</option>
                                        <option value="Sudan" {{ ( Auth::user()->client->country == 'Sudan') ? 'selected' : '' }}>Sudan</option>
                                        <option value="Suriname" {{ ( Auth::user()->client->country == 'Suriname') ? 'selected' : '' }}>Suriname</option>
                                        <option value="Svalbard and Jan Mayen" {{ ( Auth::user()->client->country == 'Svalbard and Jan Mayen') ? 'selected' : '' }}>Svalbard and Jan Mayen</option>
                                        <option value="Swaziland" {{ ( Auth::user()->client->country == 'Swaziland') ? 'selected' : '' }}>Swaziland</option>
                                        <option value="Sweden" {{ ( Auth::user()->client->country == 'Sweden') ? 'selected' : '' }}>Sweden</option>
                                        <option value="Switzerland" {{ ( Auth::user()->client->country == 'Switzerland') ? 'selected' : '' }}>Switzerland</option>
                                        <option value="Syrian Arab Republic" {{ ( Auth::user()->client->country == 'Syrian Arab Republic') ? 'selected' : '' }}>Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China" {{ ( Auth::user()->client->country == 'Taiwan, Province of China') ? 'selected' : '' }}>Taiwan, Province of China</option>
                                        <option value="Tajikistan" {{ ( Auth::user()->client->country == 'Tajikistan') ? 'selected' : '' }}>Tajikistan</option>
                                        <option value="Tanzania, United Republic of" {{ ( Auth::user()->client->country == 'Tanzania, United Republic of') ? 'selected' : '' }}>Tanzania, United Republic of</option>
                                        <option value="Thailand" {{ ( Auth::user()->client->country == 'Thailand') ? 'selected' : '' }}>Thailand</option>
                                        <option value="Timor-leste" {{ ( Auth::user()->client->country == 'Timor-leste') ? 'selected' : '' }}>Timor-leste</option>
                                        <option value="Togo" {{ ( Auth::user()->client->country == 'Togo') ? 'selected' : '' }}>Togo</option>
                                        <option value="Tokelau" {{ ( Auth::user()->client->country == 'Tokelau') ? 'selected' : '' }}>Tokelau</option>
                                        <option value="Tonga" {{ ( Auth::user()->client->country == 'Tonga') ? 'selected' : '' }}>Tonga</option>
                                        <option value="Trinidad and Tobago" {{ ( Auth::user()->client->country == 'Trinidad and Tobago') ? 'selected' : '' }}>Trinidad and Tobago</option>
                                        <option value="Tunisia" {{ ( Auth::user()->client->country == 'Tunisia') ? 'selected' : '' }}>Tunisia</option>
                                        <option value="Turkey" {{ ( Auth::user()->client->country == 'Turkey') ? 'selected' : '' }}>Turkey</option>
                                        <option value="Turkmenistan" {{ ( Auth::user()->client->country == 'Turkmenistan') ? 'selected' : '' }}>Turkmenistan</option>
                                        <option value="Turks and Caicos Islands" {{ ( Auth::user()->client->country == 'Turks and Caicos Islands') ? 'selected' : '' }}>Turks and Caicos Islands</option>
                                        <option value="Tuvalu" {{ ( Auth::user()->client->country == 'Tuvalu') ? 'selected' : '' }}>Tuvalu</option>
                                        <option value="Uganda" {{ ( Auth::user()->client->country == 'Uganda') ? 'selected' : '' }}>Uganda</option>
                                        <option value="Ukraine" {{ ( Auth::user()->client->country == 'Ukraine') ? 'selected' : '' }}>Ukraine</option>
                                        <option value="United Arab Emirates" {{ ( Auth::user()->client->country == 'United Arab Emirates') ? 'selected' : '' }}>United Arab Emirates</option>
                                        <option value="United Kingdom" {{ ( Auth::user()->client->country == 'United Kingdom') ? 'selected' : '' }}>United Kingdom</option>
                                        <option value="United States" {{ ( Auth::user()->client->country == 'United States') ? 'selected' : '' }}>United States</option>
                                        <option value="United States Minor Outlying Islands" {{ ( Auth::user()->client->country == 'United States Minor Outlying Islands') ? 'selected' : '' }}>United States Minor Outlying Islands</option>
                                        <option value="Uruguay" {{ ( Auth::user()->client->country == 'Uruguay') ? 'selected' : '' }}>Uruguay</option>
                                        <option value="Uzbekistan" {{ ( Auth::user()->client->country == 'Uzbekistan') ? 'selected' : '' }}>Uzbekistan</option>
                                        <option value="Vanuatu" {{ ( Auth::user()->client->country == 'Vanuatu') ? 'selected' : '' }}>Vanuatu</option>
                                        <option value="Venezuela" {{ ( Auth::user()->client->country == 'Venezuela') ? 'selected' : '' }}>Venezuela</option>
                                        <option value="Viet Nam" {{ ( Auth::user()->client->country == 'Viet Nam') ? 'selected' : '' }}>Viet Nam</option>
                                        <option value="Virgin Islands, British" {{ ( Auth::user()->client->country == 'Virgin Islands, British') ? 'selected' : '' }}>Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S." {{ ( Auth::user()->client->country == 'Virgin Islands, U.S.') ? 'selected' : '' }}>Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna" {{ ( Auth::user()->client->country == 'Wallis and Futuna') ? 'selected' : '' }}>Wallis and Futuna</option>
                                        <option value="Western Sahara" {{ ( Auth::user()->client->country == 'Western Sahara') ? 'selected' : '' }}>Western Sahara</option>
                                        <option value="Yemen" {{ ( Auth::user()->client->country == 'Yemen') ? 'selected' : '' }}>Yemen</option>
                                        <option value="Zambia" {{ ( Auth::user()->client->country == 'Zambia') ? 'selected' : '' }}>Zambia</option>
                                        <option value="Zimbabwe" {{ ( Auth::user()->client->country == 'Zimbabwe') ? 'selected' : '' }}>Zimbabwe</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col">
                                    <label for="email" class="col-4 col-form-label">Occupation</label>
                                    <div class="col-8">
                                      <input id="name" name="occupation" placeholder="Occupation" class="form-control here" type="text" value="{{Auth::user()->client->occupation}}" disabled>
                                    </div>
                                  </div>
                                </div>

                                <hr>

                                <div class="row">
                                  <div class="col">
                                    <label for="text">Account Number</label>
                                    <input id="text" name="account_number" placeholder="Account Number" class="form-control here" type="text" value="{{Auth::user()->client->account_number}}" disabled>
                                  </div>

                                  <div class="col">
                                      <label for="text">Account Type</label>
                                      <select class="form-control" name="account_type" disabled required>
                                        <option value="">Select Account Type</option>
                                        <option value="Individual" {{ ( Auth::user()->client->account_type == 'Individual') ? 'selected' : '' }}>Individual</option>
                                        <option value="Joint" {{ ( Auth::user()->client->account_type == 'Joint') ? 'selected' : '' }}>Joint</option>
                                        <option value="Corporate" {{ ( Auth::user()->client->account_type == 'Corporate') ? 'selected' : '' }}>Corporate</option>
                                        </select>
                                  </div>

                                  <div class="col">
                                    <label for="">Salutation</label>
                                    <select class="form-control" name="salutation" disabled required>
                                      <option value="">Select Salutation</option>
                                      <option value="Mr" {{ ( Auth::user()->client->salutation == 'Mr') ? 'selected' : '' }}>Mr</option>
                                      <option value="Mrs" {{ ( Auth::user()->client->salutation == 'Mrs') ? 'selected' : '' }}>Mrs</option>
                                      <option value="Miss" {{ ( Auth::user()->client->salutation == 'Miss') ? 'selected' : '' }}>Miss</option>
                                    </select>
                                  </div>
                                </div>


                                <div class="row">
                                  <div class="col">
                                    <label for="text">Address</label>
                                    <input id="text" name="address" placeholder="Address" class="form-control here" type="text" value="{{Auth::user()->client->address}}" disabled>
                                  </div>

                                  <div class="col">
                                      <label for="text">Mobile Number</label>
                                      <input id="text" name="mobile_number" placeholder="Mobile Number" class="form-control here" type="text" value="{{Auth::user()->client->mobile_number}}" disabled>
                                  </div>

                                  <div class="col">
                                      <label for="text">Home Number</label>
                                      <input id="text" name="home_number" placeholder="Home Number" class="form-control here" type="text" value="{{Auth::user()->client->home_number}}" disabled>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col">
                                    <label for="text">Business Number</label>
                                    <input id="text" name="business_number" placeholder="Business Number" class="form-control here" type="text" value="{{Auth::user()->client->business_number}}" disabled>
                                  </div>

                                  <div class="col">
                                    <label for="text">Date of Birth</label>
                                    @if (Auth::user()->client->dob !== null)
                                    <input id="date" name="dob" placeholder="Date of Birth" class="form-control here" type="date" value="{{Auth::user()->client->dob->format('Y-m-d')}}" disabled>
                                    @else
                                    <input id="date" name="dob" placeholder="Date of Birth" class="form-control here" type="date" disabled>
                                    @endif
                                  </div>

                                  <div class="col">
                                    <label for="text">Place of Birth</label>
                                    <input id="text" name="pob" placeholder="Home Number" class="form-control here" type="text" value="{{Auth::user()->client->pob}}" disabled>
                                  </div>
                                </div>


                                <div class="row">
                                  <div class="col">
                                    <label for="">Marital Status (required)</label>
                                    <select class="form-control" name="mstatus" disabled required>
                                      <option value="">Select Marital Status</option>
                                      <option value="Single/Unmarried" {{ ( Auth::user()->client->mstatus == 'Single/Unmarried') ? 'selected' : '' }}>Single/Unmarried</option>
                                      <option value="Married" {{ ( Auth::user()->client->mstatus == 'Married') ? 'selected' : '' }}>Married</option>
                                      <option value="Divorced" {{ ( Auth::user()->client->mstatus == 'Divorced') ? 'selected' : '' }}>Divorced</option>
                                      <option value="Widowed" {{ ( Auth::user()->client->mstatus == 'Widowed') ? 'selected' : '' }}>Widowed</option>
                                    </select>
                                  </div>

                                  <div class="col">
                                    <label for="text">Company Name</label>
                                    <input id="text" name="company_name" placeholder="Company Name" class="form-control here" type="text" value="{{Auth::user()->client->company_name}}" disabled>
                                  </div>

                                  <div class="col">
                                    <label for="text">Company Address</label>
                                    <input id="text" name="company_address" placeholder="Company Address" class="form-control here" type="text" value="{{Auth::user()->client->company_address}}" disabled>
                                  </div>
                                </div>

                                <!-- <div class="form-group row">
                                  <label for="email" class="col-4 col-form-label">Traded</label>
                                  <div class="col-8">
                                    <input type="radio" value="yes" name="traded" {{ ( Auth::user()->client->traded == 'yes') ? 'checked' : '' }} disabled> YES
                                    <input type="radio" value="no" name="traded" {{ ( Auth::user()->client->traded == 'no') ? 'checked' : '' }} disabled> NO
                                  </div>
                                </div> -->

                                <div class="form-group row">
                                  <div class="offset-4 col-8">
                                    <!-- <button id="triggerEdit" type="button" class="btn btn-secondary">Edit Profile</button> -->
                                    <button type="submit" id="editButton" type="button" class="btn btn-default">Update Profile</button>
                                    <button id="cancelButton" type="button" class="btn btn-secondary" onclick="disableEdit()">Cancel</button>
                                  </div>
                                </div>
                              </form>
                      </div>
                  </div>

              </div>
          </div>
        </div>
      </div>
  </main>
<!-- page-content" -->
</div>

<script type="text/javascript">

function enableEdit() {
    $('input:disabled, select:disabled, select:disabled').each(function () {
       $(this).removeAttr('disabled');
    });

    $('#triggerEdit').hide();
    $('#editButton').show();
    $('#cancelButton').show();
}

function disableEdit() {
  location.reload();
}

  $(document).ready(function()
  {
      $('#editButton').hide();
      $('#cancelButton').hide();
      $("#triggerEdit").click(function() {
        enableEdit();
      });
  });
</script>
@endsection
