<style media="screen">
.modal-lg {
  max-width: 80% !important;
}
</style>
<!-- Modal -->
<div class="modal fade" id="viewClientProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width:900px !important">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Client Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h3>{{$client->fullname}}</h3>
                        <h6><b>Date Added</b> {{ \Carbon\Carbon::parse($client->created_at)->format('m/d/Y')}}</h6>
                        <!-- <h6>{{$client->created_at->diffForHumans()}}</h6> -->

                        <form class="" action="{{url('client-edit-email')}}" method="post" id="editEmailForm">
                          @csrf
                          <input type="hidden" name="id" value="{{$client->id}}">
                          <div class="form-group row">
                            <label for="email" class="col-4 col-form-label">Account Email</label>
                            <div class="col-8">
                              <input type="email" id="name" name="email" placeholder="Email" class="form-control here" type="text" value="{{$client->email}}" disabled>
                            </div>
                          </div>

                          <div class="offset-4 col-8">
                            <button id="triggerEditEmail" type="button" class="btn btn-secondary">Edit Email</button>
                            <button type="submit" id="editButtonEmail" type="button" class="btn btn-default">Update Profile</button>
                            <button id="cancelButtonEmail" type="button" class="btn btn-secondary" onclick="disableEdit()">Cancel</button>
                          </div>
                        </form>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form action="{{url('client-edit')}}" method="POST" id="editClientForm">
                          @csrf
                              <input type="hidden" name="id" value="{{$client->id}}">
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Full Name</label>
                                <div class="col-8">
                                  <input type="text" id="name" name="fullname" placeholder="Full Name" class="form-control here" type="text" value="{{$client->fullname}}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Alternative Email</label>
                                <div class="col-8">
                                  <input type="email" id="name" name="email2" placeholder="Alternative Email" class="form-control here" type="text" value="{{$client->email2}}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Phone Number</label>
                                <div class="col-8">
                                  <input type="text" id="name" name="phone" placeholder="Phone Number" class="form-control here" type="text" value="{{$client->phone}}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Alternative Phone Number</label>
                                <div class="col-8">
                                  <input type="text" id="name" name="phone2" placeholder="Alternative Phone Number" class="form-control here" type="text" value="{{$client->phone2}}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Country</label>
                                <div class="col-8">
                                  <select class="form-control" name="country" disabled required>
                                    <option value="">Select Country</option>
                                    <option value="Afghanistan" {{ ( $client->country == 'Afghanistan') ? 'selected' : '' }}>Afghanistan</option>
                                    <option value="Åland Islands" {{ ( $client->country == 'Åland Islands') ? 'selected' : '' }}>Åland Islands</option>
                                    <option value="Albania" {{ ( $client->country == 'Albania') ? 'selected' : '' }}>Albania</option>
                                    <option value="Algeria" {{ ( $client->country == 'Algeria') ? 'selected' : '' }}>Algeria</option>
                                    <option value="American Samoa" {{ ( $client->country == 'American Samoa') ? 'selected' : '' }}>American Samoa</option>
                                    <option value="Andorra" {{ ( $client->country == 'Andorra') ? 'selected' : '' }}>Andorra</option>
                                    <option value="Angola" {{ ( $client->country == 'Angola') ? 'selected' : '' }}>Angola</option>
                                    <option value="Anguilla" {{ ( $client->country == 'Anguilla') ? 'selected' : '' }}>Anguilla</option>
                                    <option value="Antarctica" {{ ( $client->country == 'Antarctica') ? 'selected' : '' }}>Antarctica</option>
                                    <option value="Antigua and Barbuda" {{ ( $client->country == 'Antigua and Barbuda') ? 'selected' : '' }}>Antigua and Barbuda</option>
                                    <option value="Argentina" {{ ( $client->country == 'Argentina') ? 'selected' : '' }}>Argentina</option>
                                    <option value="Armenia" {{ ( $client->country == 'Armenia') ? 'selected' : '' }}>Armenia</option>
                                    <option value="Aruba" {{ ( $client->country == 'Aruba') ? 'selected' : '' }}>Aruba</option>
                                    <option value="Australia" {{ ( $client->country == 'Australia') ? 'selected' : '' }}>Australia</option>
                                    <option value="Austria" {{ ( $client->country == 'Austria') ? 'selected' : '' }}>Austria</option>
                                    <option value="Azerbaijan" {{ ( $client->country == 'Azerbaijan') ? 'selected' : '' }}>Azerbaijan</option>
                                    <option value="Bahamas" {{ ( $client->country == 'Bahamas') ? 'selected' : '' }}>Bahamas</option>
                                    <option value="Bahrain" {{ ( $client->country == 'Bahrain') ? 'selected' : '' }}>Bahrain</option>
                                    <option value="Bangladesh" {{ ( $client->country == 'Bangladesh') ? 'selected' : '' }}>Bangladesh</option>
                                    <option value="Barbados" {{ ( $client->country == 'Barbados') ? 'selected' : '' }}>Barbados</option>
                                    <option value="Belarus" {{ ( $client->country == 'Belarus') ? 'selected' : '' }}>Belarus</option>
                                    <option value="Belgium" {{ ( $client->country == 'Belgium') ? 'selected' : '' }}>Belgium</option>
                                    <option value="Belize" {{ ( $client->country == 'Belize') ? 'selected' : '' }}>Belize</option>
                                    <option value="Benin" {{ ( $client->country == 'Benin') ? 'selected' : '' }}>Benin</option>
                                    <option value="Bermuda" {{ ( $client->country == 'Bermuda') ? 'selected' : '' }}>Bermuda</option>
                                    <option value="Bhutan" {{ ( $client->country == 'Bhutan') ? 'selected' : '' }}>Bhutan</option>
                                    <option value="Bolivia" {{ ( $client->country == 'Bolivia') ? 'selected' : '' }}>Bolivia</option>
                                    <option value="Bosnia and Herzegovina" {{ ( $client->country == 'Bosnia and Herzegovina') ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                                    <option value="Botswana" {{ ( $client->country == 'Botswana') ? 'selected' : '' }}>Botswana</option>
                                    <option value="Bouvet Island" {{ ( $client->country == 'Bouvet Island') ? 'selected' : '' }}>Bouvet Island</option>
                                    <option value="Brazil" {{ ( $client->country == 'Brazil') ? 'selected' : '' }}>Brazil</option>
                                    <option value="British Indian Ocean Territory" {{ ( $client->country == 'British Indian Ocean Territory') ? 'selected' : '' }}>British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam" {{ ( $client->country == 'Brunei Darussalam') ? 'selected' : '' }}>Brunei Darussalam</option>
                                    <option value="Bulgaria" {{ ( $client->country == 'Bulgaria') ? 'selected' : '' }}>Bulgaria</option>
                                    <option value="Burkina Faso" {{ ( $client->country == 'Burkina Faso') ? 'selected' : '' }}>Burkina Faso</option>
                                    <option value="Burundi" {{ ( $client->country == 'Burundi') ? 'selected' : '' }}>Burundi</option>
                                    <option value="Cambodia" {{ ( $client->country == 'Cambodia') ? 'selected' : '' }}>Cambodia</option>
                                    <option value="Cameroon" {{ ( $client->country == 'Cameroon') ? 'selected' : '' }}>Cameroon</option>
                                    <option value="Canada" {{ ( $client->country == 'Canada') ? 'selected' : '' }}>Canada</option>
                                    <option value="Cape Verde" {{ ( $client->country == 'Cape Verde') ? 'selected' : '' }}>Cape Verde</option>
                                    <option value="Cayman Islands" {{ ( $client->country == 'Cayman Islands') ? 'selected' : '' }}>Cayman Islands</option>
                                    <option value="Central African Republic" {{ ( $client->country == 'Central African Republic') ? 'selected' : '' }}>Central African Republic</option>
                                    <option value="Chad" {{ ( $client->country == 'Chad') ? 'selected' : '' }}>Chad</option>
                                    <option value="Chile" {{ ( $client->country == 'Chile') ? 'selected' : '' }}>Chile</option>
                                    <option value="China" {{ ( $client->country == 'China') ? 'selected' : '' }}>China</option>
                                    <option value="Christmas Island" {{ ( $client->country == 'Christmas Island') ? 'selected' : '' }}>Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands" {{ ( $client->country == 'Cocos (Keeling) Islands') ? 'selected' : '' }}>Cocos (Keeling) Islands</option>
                                    <option value="Colombia" {{ ( $client->country == 'Colombia') ? 'selected' : '' }}>Colombia</option>
                                    <option value="Comoros" {{ ( $client->country == 'Comoros') ? 'selected' : '' }}>Comoros</option>
                                    <option value="Congo" {{ ( $client->country == 'Congo') ? 'selected' : '' }}>Congo</option>
                                    <option value="Congo, The Democratic Republic of The" {{ ( $client->country == 'Congo, The Democratic Republic of The') ? 'selected' : '' }}>Congo, The Democratic Republic of The</option>
                                    <option value="Cook Islands" {{ ( $client->country == 'Cook Islands') ? 'selected' : '' }}>Cook Islands</option>
                                    <option value="Costa Rica" {{ ( $client->country == 'Costa Rica') ? 'selected' : '' }}>Costa Rica</option>
                                    <option value="Cote D'ivoire" {{ ( $client->country == 'Cote D\'ivoire') ? 'selected' : '' }}>Cote D'ivoire</option>
                                    <option value="Croatia" {{ ( $client->country == 'Croatia') ? 'selected' : '' }}>Croatia</option>
                                    <option value="Cuba" {{ ( $client->country == 'Cuba') ? 'selected' : '' }}>Cuba</option>
                                    <option value="Cyprus" {{ ( $client->country == 'Cyprus') ? 'selected' : '' }}>Cyprus</option>
                                    <option value="Czech Republic" {{ ( $client->country == 'Czech Republic') ? 'selected' : '' }}>Czech Republic</option>
                                    <option value="Denmark" {{ ( $client->country == 'Denmark') ? 'selected' : '' }}>Denmark</option>
                                    <option value="Djibouti" {{ ( $client->country == 'Djibouti') ? 'selected' : '' }}>Djibouti</option>
                                    <option value="Dominica" {{ ( $client->country == 'Dominica') ? 'selected' : '' }}>Dominica</option>
                                    <option value="Dominican Republic" {{ ( $client->country == 'Dominican Republic') ? 'selected' : '' }}>Dominican Republic</option>
                                    <option value="Ecuador" {{ ( $client->country == 'Ecuador') ? 'selected' : '' }}>Ecuador</option>
                                    <option value="Egypt" {{ ( $client->country == 'Egypt') ? 'selected' : '' }}>Egypt</option>
                                    <option value="El Salvador" {{ ( $client->country == 'El Salvador') ? 'selected' : '' }}>El Salvador</option>
                                    <option value="Equatorial Guinea" {{ ( $client->country == 'Equatorial Guinea') ? 'selected' : '' }}>Equatorial Guinea</option>
                                    <option value="Eritrea" {{ ( $client->country == 'Eritrea') ? 'selected' : '' }}>Eritrea</option>
                                    <option value="Estonia" {{ ( $client->country == 'Estonia') ? 'selected' : '' }}>Estonia</option>
                                    <option value="Ethiopia" {{ ( $client->country == 'Ethiopia') ? 'selected' : '' }}>Ethiopia</option>
                                    <option value="Falkland Islands (Malvinas)" {{ ( $client->country == 'Faroe Islands') ? 'selected' : '' }}>Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands" {{ ( $client->country == 'Faroe Islands') ? 'selected' : '' }}>Faroe Islands</option>
                                    <option value="Fiji" {{ ( $client->country == 'Fiji') ? 'selected' : '' }}>Fiji</option>
                                    <option value="Finland" {{ ( $client->country == 'Finland') ? 'selected' : '' }}>Finland</option>
                                    <option value="France" {{ ( $client->country == 'France') ? 'selected' : '' }}>France</option>
                                    <option value="French Guiana" {{ ( $client->country == 'French Guiana') ? 'selected' : '' }}>French Guiana</option>
                                    <option value="French Polynesia" {{ ( $client->country == 'French Polynesia') ? 'selected' : '' }}>French Polynesia</option>
                                    <option value="French Southern Territories" {{ ( $client->country == 'French Southern Territories') ? 'selected' : '' }}>French Southern Territories</option>
                                    <option value="Gabon" {{ ( $client->country == 'Gabon') ? 'selected' : '' }}>Gabon</option>
                                    <option value="Gambia" {{ ( $client->country == 'Gambia') ? 'selected' : '' }}>Gambia</option>
                                    <option value="Georgia" {{ ( $client->country == 'Georgia') ? 'selected' : '' }}>Georgia</option>
                                    <option value="Germany" {{ ( $client->country == 'Germany') ? 'selected' : '' }}>Germany</option>
                                    <option value="Ghana" {{ ( $client->country == 'Ghana') ? 'selected' : '' }}>Ghana</option>
                                    <option value="Gibraltar" {{ ( $client->country == 'Gibraltar') ? 'selected' : '' }}>Gibraltar</option>
                                    <option value="Greece" {{ ( $client->country == 'Greece') ? 'selected' : '' }}>Greece</option>
                                    <option value="Greenland" {{ ( $client->country == 'Greenland') ? 'selected' : '' }}>Greenland</option>
                                    <option value="Grenada" {{ ( $client->country == 'Grenada') ? 'selected' : '' }}>Grenada</option>
                                    <option value="Guadeloupe" {{ ( $client->country == 'Guadeloupe') ? 'selected' : '' }}>Guadeloupe</option>
                                    <option value="Guam" {{ ( $client->country == 'Guam') ? 'selected' : '' }}>Guam</option>
                                    <option value="Guatemala" {{ ( $client->country == 'Guatemala') ? 'selected' : '' }}>Guatemala</option>
                                    <option value="Guernsey" {{ ( $client->country == 'Guernsey') ? 'selected' : '' }}>Guernsey</option>
                                    <option value="Guinea" {{ ( $client->country == 'Guinea') ? 'selected' : '' }}>Guinea</option>
                                    <option value="Guinea-bissau" {{ ( $client->country == 'Guinea-bissau') ? 'selected' : '' }}>Guinea-bissau</option>
                                    <option value="Guyana" {{ ( $client->country == 'Guyana') ? 'selected' : '' }}>Guyana</option>
                                    <option value="Haiti" {{ ( $client->country == 'Haiti') ? 'selected' : '' }}>Haiti</option>
                                    <option value="Heard Island and Mcdonald Islands" {{ ( $client->country == 'Heard Island and Mcdonald Islands') ? 'selected' : '' }}>Heard Island and Mcdonald Islands</option>
                                    <option value="Holy See (Vatican City State)" {{ ( $client->country == 'Holy See (Vatican City State)') ? 'selected' : '' }}>Holy See (Vatican City State)</option>
                                    <option value="Honduras" {{ ( $client->country == 'Honduras') ? 'selected' : '' }}>Honduras</option>
                                    <option value="Hong Kong" {{ ( $client->country == 'Hong Kong') ? 'selected' : '' }}>Hong Kong</option>
                                    <option value="Hungary" {{ ( $client->country == 'Hungary') ? 'selected' : '' }}>Hungary</option>
                                    <option value="Iceland" {{ ( $client->country == 'Iceland') ? 'selected' : '' }}>Iceland</option>
                                    <option value="India" {{ ( $client->country == 'India') ? 'selected' : '' }}>India</option>
                                    <option value="Indonesia" {{ ( $client->country == 'Indonesia') ? 'selected' : '' }}>Indonesia</option>
                                    <option value="Iran, Islamic Republic of" {{ ( $client->country == 'Iran, Islamic Republic of') ? 'selected' : '' }}>Iran, Islamic Republic of</option>
                                    <option value="Iraq" {{ ( $client->country == 'Iraq') ? 'selected' : '' }}>Iraq</option>
                                    <option value="Ireland" {{ ( $client->country == 'Ireland') ? 'selected' : '' }}>Ireland</option>
                                    <option value="Isle of Man" {{ ( $client->country == 'Isle of Man') ? 'selected' : '' }}>Isle of Man</option>
                                    <option value="Israel" {{ ( $client->country == 'Israel') ? 'selected' : '' }}>Israel</option>
                                    <option value="Italy" {{ ( $client->country == 'Italy') ? 'selected' : '' }}>Italy</option>
                                    <option value="Jamaica" {{ ( $client->country == 'Jamaica') ? 'selected' : '' }}>Jamaica</option>
                                    <option value="Japan" {{ ( $client->country == 'Japan') ? 'selected' : '' }}>Japan</option>
                                    <option value="Jersey" {{ ( $client->country == 'Jersey') ? 'selected' : '' }}>Jersey</option>
                                    <option value="Jordan" {{ ( $client->country == 'Jordan') ? 'selected' : '' }}>Jordan</option>
                                    <option value="Kazakhstan" {{ ( $client->country == 'Kazakhstan') ? 'selected' : '' }}>Kazakhstan</option>
                                    <option value="Kenya" {{ ( $client->country == 'Kenya') ? 'selected' : '' }}>Kenya</option>
                                    <option value="Kiribati" {{ ( $client->country == 'Kiribati') ? 'selected' : '' }}>Kiribati</option>
                                    <option value="Korea, Democratic People's Republic of" {{ ( $client->country == 'Korea, Democratic People\'s Republic of') ? 'selected' : '' }}>Korea, Democratic People's Republic of</option>
                                    <option value="Korea, Republic of" {{ ( $client->country == 'Korea, Republic of') ? 'selected' : '' }}>Korea, Republic of</option>
                                    <option value="Kuwait" {{ ( $client->country == 'Kuwait') ? 'selected' : '' }}>Kuwait</option>
                                    <option value="Kyrgyzstan" {{ ( $client->country == 'Kyrgyzstan') ? 'selected' : '' }}>Kyrgyzstan</option>
                                    <option value="Lao People's Democratic Republic" {{ ( $client->country == 'Lao People\'s Democratic Republic') ? 'selected' : '' }}>Lao People's Democratic Republic</option>
                                    <option value="Latvia" {{ ( $client->country == 'Latvia') ? 'selected' : '' }}>Latvia</option>
                                    <option value="Lebanon" {{ ( $client->country == 'Lebanon') ? 'selected' : '' }}>Lebanon</option>
                                    <option value="Lesotho" {{ ( $client->country == 'Lesotho') ? 'selected' : '' }}>Lesotho</option>
                                    <option value="Liberia" {{ ( $client->country == 'Liberia') ? 'selected' : '' }}>Liberia</option>
                                    <option value="Libyan Arab Jamahiriya" {{ ( $client->country == 'Libyan Arab Jamahiriya') ? 'selected' : '' }}>Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein" {{ ( $client->country == 'Liechtenstein') ? 'selected' : '' }}>Liechtenstein</option>
                                    <option value="Lithuania" {{ ( $client->country == 'Lithuania') ? 'selected' : '' }}>Lithuania</option>
                                    <option value="Luxembourg" {{ ( $client->country == 'Luxembourg') ? 'selected' : '' }}>Luxembourg</option>
                                    <option value="Macao" {{ ( $client->country == 'Macao') ? 'selected' : '' }}>Macao</option>
                                    <option value="Macedonia, The Former Yugoslav Republic of" {{ ( $client->country == 'Macedonia, The Former Yugoslav Republic of') ? 'selected' : '' }}>Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="Madagascar" {{ ( $client->country == 'Madagascar') ? 'selected' : '' }}>Madagascar</option>
                                    <option value="Malawi" {{ ( $client->country == 'Malawi') ? 'selected' : '' }}>Malawi</option>
                                    <option value="Malaysia" {{ ( $client->country == 'Malaysia') ? 'selected' : '' }}>Malaysia</option>
                                    <option value="Maldives" {{ ( $client->country == 'Maldives') ? 'selected' : '' }}>Maldives</option>
                                    <option value="Mali" {{ ( $client->country == 'Mali') ? 'selected' : '' }}>Mali</option>
                                    <option value="Malta" {{ ( $client->country == 'Malta') ? 'selected' : '' }}>Malta</option>
                                    <option value="Marshall Islands" {{ ( $client->country == 'Marshall Islands') ? 'selected' : '' }}>Marshall Islands</option>
                                    <option value="Martinique" {{ ( $client->country == 'Martinique') ? 'selected' : '' }}>Martinique</option>
                                    <option value="Mauritania" {{ ( $client->country == 'Mauritania') ? 'selected' : '' }}>Mauritania</option>
                                    <option value="Mauritius" {{ ( $client->country == 'Mauritius') ? 'selected' : '' }}>Mauritius</option>
                                    <option value="Mayotte" {{ ( $client->country == 'Mayotte') ? 'selected' : '' }}>Mayotte</option>
                                    <option value="Mexico" {{ ( $client->country == 'Mexico') ? 'selected' : '' }}>Mexico</option>
                                    <option value="Micronesia, Federated States of" {{ ( $client->country == 'Micronesia, Federated States of') ? 'selected' : '' }}>Micronesia, Federated States of</option>
                                    <option value="Moldova, Republic of" {{ ( $client->country == 'Moldova, Republic of') ? 'selected' : '' }}>Moldova, Republic of</option>
                                    <option value="Monaco" {{ ( $client->country == 'Monaco') ? 'selected' : '' }}>Monaco</option>
                                    <option value="Mongolia" {{ ( $client->country == 'Mongolia') ? 'selected' : '' }}>Mongolia</option>
                                    <option value="Montenegro" {{ ( $client->country == 'Montenegro') ? 'selected' : '' }}>Montenegro</option>
                                    <option value="Montserrat" {{ ( $client->country == 'Montserrat') ? 'selected' : '' }}>Montserrat</option>
                                    <option value="Morocco" {{ ( $client->country == 'Morocco') ? 'selected' : '' }}>Morocco</option>
                                    <option value="Mozambique" {{ ( $client->country == 'Mozambique') ? 'selected' : '' }}>Mozambique</option>
                                    <option value="Myanmar" {{ ( $client->country == 'Myanmar') ? 'selected' : '' }}>Myanmar</option>
                                    <option value="Namibia" {{ ( $client->country == 'Namibia') ? 'selected' : '' }}>Namibia</option>
                                    <option value="Nauru" {{ ( $client->country == 'Nauru') ? 'selected' : '' }}>Nauru</option>
                                    <option value="Nepal" {{ ( $client->country == 'Nepal') ? 'selected' : '' }}>Nepal</option>
                                    <option value="Netherlands" {{ ( $client->country == 'Netherlands') ? 'selected' : '' }}>Netherlands</option>
                                    <option value="Netherlands Antilles" {{ ( $client->country == 'Netherlands Antilles') ? 'selected' : '' }}>Netherlands Antilles</option>
                                    <option value="New Caledonia" {{ ( $client->country == 'New Caledonia') ? 'selected' : '' }}>New Caledonia</option>
                                    <option value="New Zealand" {{ ( $client->country == 'New Zealand') ? 'selected' : '' }}>New Zealand</option>
                                    <option value="Nicaragua" {{ ( $client->country == 'Nicaragua') ? 'selected' : '' }}>Nicaragua</option>
                                    <option value="Niger" {{ ( $client->country == 'Niger') ? 'selected' : '' }}>Niger</option>
                                    <option value="Nigeria" {{ ( $client->country == 'Nigeria') ? 'selected' : '' }}>Nigeria</option>
                                    <option value="Niue" {{ ( $client->country == 'Niue') ? 'selected' : '' }}>Niue</option>
                                    <option value="Norfolk Island" {{ ( $client->country == 'Norfolk Island') ? 'selected' : '' }}>Norfolk Island</option>
                                    <option value="Northern Mariana Islands" {{ ( $client->country == 'Northern Mariana Islands') ? 'selected' : '' }}>Northern Mariana Islands</option>
                                    <option value="Norway" {{ ( $client->country == 'Norway') ? 'selected' : '' }}>Norway</option>
                                    <option value="Oman" {{ ( $client->country == 'Oman') ? 'selected' : '' }}>Oman</option>
                                    <option value="Pakistan" {{ ( $client->country == 'Pakistan') ? 'selected' : '' }}>Pakistan</option>
                                    <option value="Palau" {{ ( $client->country == 'Palau') ? 'selected' : '' }}>Palau</option>
                                    <option value="Palestinian Territory, Occupied"> {{ ( $client->country == 'Palestinian Territory, Occupied') ? 'selected' : '' }}Palestinian Territory, Occupied</option>
                                    <option value="Panama" {{ ( $client->country == 'Panama') ? 'selected' : '' }}>Panama</option>
                                    <option value="Papua New Guinea" {{ ( $client->country == 'Papua New Guinea') ? 'selected' : '' }}>Papua New Guinea</option>
                                    <option value="Paraguay" {{ ( $client->country == 'Paraguay') ? 'selected' : '' }}>Paraguay</option>
                                    <option value="Peru" {{ ( $client->country == 'Peru') ? 'selected' : '' }}>Peru</option>
                                    <option value="Philippines" {{ ( $client->country == 'Philippines') ? 'selected' : '' }}>Philippines</option>
                                    <option value="Pitcairn" {{ ( $client->country == 'Pitcairn') ? 'selected' : '' }}>Pitcairn</option>
                                    <option value="Poland" {{ ( $client->country == 'Poland') ? 'selected' : '' }}>Poland</option>
                                    <option value="Portugal" {{ ( $client->country == 'Portugal') ? 'selected' : '' }}>Portugal</option>
                                    <option value="Puerto Rico" {{ ( $client->country == 'Puerto Rico') ? 'selected' : '' }}>Puerto Rico</option>
                                    <option value="Qatar" {{ ( $client->country == 'Qatar') ? 'selected' : '' }}>Qatar</option>
                                    <option value="Reunion" {{ ( $client->country == 'Reunion') ? 'selected' : '' }}>Reunion</option>
                                    <option value="Romania" {{ ( $client->country == 'Romania') ? 'selected' : '' }}>Romania</option>
                                    <option value="Russian Federation" {{ ( $client->country == 'Russian Federation') ? 'selected' : '' }}>Russian Federation</option>
                                    <option value="Rwanda" {{ ( $client->country == 'Rwanda') ? 'selected' : '' }}>Rwanda</option>
                                    <option value="Saint Helena" {{ ( $client->country == 'Saint Helena') ? 'selected' : '' }}>Saint Helena</option>
                                    <option value="Saint Kitts and Nevis" {{ ( $client->country == 'Saint Kitts and Nevis') ? 'selected' : '' }}>Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia" {{ ( $client->country == 'Saint Lucia') ? 'selected' : '' }}>Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon" {{ ( $client->country == 'Saint Pierre and Miquelon') ? 'selected' : '' }}>Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and The Grenadines" {{ ( $client->country == 'Saint Vincent and The Grenadines') ? 'selected' : '' }}>Saint Vincent and The Grenadines</option>
                                    <option value="Samoa" {{ ( $client->country == 'Samoa') ? 'selected' : '' }}>Samoa</option>
                                    <option value="San Marino" {{ ( $client->country == 'San Marino') ? 'selected' : '' }}>San Marino</option>
                                    <option value="Sao Tome and Principe" {{ ( $client->country == 'Sao Tome and Principe') ? 'selected' : '' }}>Sao Tome and Principe</option>
                                    <option value="Saudi Arabia" {{ ( $client->country == 'Saudi Arabia') ? 'selected' : '' }}>Saudi Arabia</option>
                                    <option value="Senegal" {{ ( $client->country == 'Senegal') ? 'selected' : '' }}>Senegal</option>
                                    <option value="Serbia" {{ ( $client->country == 'Serbia') ? 'selected' : '' }}>Serbia</option>
                                    <option value="Seychelles" {{ ( $client->country == 'Seychelles') ? 'selected' : '' }}>Seychelles</option>
                                    <option value="Sierra Leone" {{ ( $client->country == 'Sierra Leone') ? 'selected' : '' }}>Sierra Leone</option>
                                    <option value="Singapore" {{ ( $client->country == 'Singapore') ? 'selected' : '' }}>Singapore</option>
                                    <option value="Slovakia" {{ ( $client->country == 'Slovakia') ? 'selected' : '' }}>Slovakia</option>
                                    <option value="Slovenia" {{ ( $client->country == 'Slovenia') ? 'selected' : '' }}>Slovenia</option>
                                    <option value="Solomon Islands" {{ ( $client->country == 'Solomon Islands') ? 'selected' : '' }}>Solomon Islands</option>
                                    <option value="Somalia" {{ ( $client->country == 'Somalia') ? 'selected' : '' }}>Somalia</option>
                                    <option value="South Africa" {{ ( $client->country == 'South Africa') ? 'selected' : '' }}>South Africa</option>
                                    <option value="South Georgia and The South Sandwich Islands" {{ ( $client->country == 'South Georgia and The South Sandwich Islands') ? 'selected' : '' }}>South Georgia and The South Sandwich Islands</option>
                                    <option value="Spain" {{ ( $client->country == 'Spain') ? 'selected' : '' }}>Spain</option>
                                    <option value="Sri Lanka" {{ ( $client->country == 'Sri Lanka') ? 'selected' : '' }}>Sri Lanka</option>
                                    <option value="Sudan" {{ ( $client->country == 'Sudan') ? 'selected' : '' }}>Sudan</option>
                                    <option value="Suriname" {{ ( $client->country == 'Suriname') ? 'selected' : '' }}>Suriname</option>
                                    <option value="Svalbard and Jan Mayen" {{ ( $client->country == 'Svalbard and Jan Mayen') ? 'selected' : '' }}>Svalbard and Jan Mayen</option>
                                    <option value="Swaziland" {{ ( $client->country == 'Swaziland') ? 'selected' : '' }}>Swaziland</option>
                                    <option value="Sweden" {{ ( $client->country == 'Sweden') ? 'selected' : '' }}>Sweden</option>
                                    <option value="Switzerland" {{ ( $client->country == 'Switzerland') ? 'selected' : '' }}>Switzerland</option>
                                    <option value="Syrian Arab Republic" {{ ( $client->country == 'Syrian Arab Republic') ? 'selected' : '' }}>Syrian Arab Republic</option>
                                    <option value="Taiwan, Province of China" {{ ( $client->country == 'Taiwan, Province of China') ? 'selected' : '' }}>Taiwan, Province of China</option>
                                    <option value="Tajikistan" {{ ( $client->country == 'Tajikistan') ? 'selected' : '' }}>Tajikistan</option>
                                    <option value="Tanzania, United Republic of" {{ ( $client->country == 'Tanzania, United Republic of') ? 'selected' : '' }}>Tanzania, United Republic of</option>
                                    <option value="Thailand" {{ ( $client->country == 'Thailand') ? 'selected' : '' }}>Thailand</option>
                                    <option value="Timor-leste" {{ ( $client->country == 'Timor-leste') ? 'selected' : '' }}>Timor-leste</option>
                                    <option value="Togo" {{ ( $client->country == 'Togo') ? 'selected' : '' }}>Togo</option>
                                    <option value="Tokelau" {{ ( $client->country == 'Tokelau') ? 'selected' : '' }}>Tokelau</option>
                                    <option value="Tonga" {{ ( $client->country == 'Tonga') ? 'selected' : '' }}>Tonga</option>
                                    <option value="Trinidad and Tobago" {{ ( $client->country == 'Trinidad and Tobago') ? 'selected' : '' }}>Trinidad and Tobago</option>
                                    <option value="Tunisia" {{ ( $client->country == 'Tunisia') ? 'selected' : '' }}>Tunisia</option>
                                    <option value="Turkey" {{ ( $client->country == 'Turkey') ? 'selected' : '' }}>Turkey</option>
                                    <option value="Turkmenistan" {{ ( $client->country == 'Turkmenistan') ? 'selected' : '' }}>Turkmenistan</option>
                                    <option value="Turks and Caicos Islands" {{ ( $client->country == 'Turks and Caicos Islands') ? 'selected' : '' }}>Turks and Caicos Islands</option>
                                    <option value="Tuvalu" {{ ( $client->country == 'Tuvalu') ? 'selected' : '' }}>Tuvalu</option>
                                    <option value="Uganda" {{ ( $client->country == 'Uganda') ? 'selected' : '' }}>Uganda</option>
                                    <option value="Ukraine" {{ ( $client->country == 'Ukraine') ? 'selected' : '' }}>Ukraine</option>
                                    <option value="United Arab Emirates" {{ ( $client->country == 'United Arab Emirates') ? 'selected' : '' }}>United Arab Emirates</option>
                                    <option value="United Kingdom" {{ ( $client->country == 'United Kingdom') ? 'selected' : '' }}>United Kingdom</option>
                                    <option value="United States" {{ ( $client->country == 'United States') ? 'selected' : '' }}>United States</option>
                                    <option value="United States Minor Outlying Islands" {{ ( $client->country == 'United States Minor Outlying Islands') ? 'selected' : '' }}>United States Minor Outlying Islands</option>
                                    <option value="Uruguay" {{ ( $client->country == 'Uruguay') ? 'selected' : '' }}>Uruguay</option>
                                    <option value="Uzbekistan" {{ ( $client->country == 'Uzbekistan') ? 'selected' : '' }}>Uzbekistan</option>
                                    <option value="Vanuatu" {{ ( $client->country == 'Vanuatu') ? 'selected' : '' }}>Vanuatu</option>
                                    <option value="Venezuela" {{ ( $client->country == 'Venezuela') ? 'selected' : '' }}>Venezuela</option>
                                    <option value="Viet Nam" {{ ( $client->country == 'Viet Nam') ? 'selected' : '' }}>Viet Nam</option>
                                    <option value="Virgin Islands, British" {{ ( $client->country == 'Virgin Islands, British') ? 'selected' : '' }}>Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S." {{ ( $client->country == 'Virgin Islands, U.S.') ? 'selected' : '' }}>Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna" {{ ( $client->country == 'Wallis and Futuna') ? 'selected' : '' }}>Wallis and Futuna</option>
                                    <option value="Western Sahara" {{ ( $client->country == 'Western Sahara') ? 'selected' : '' }}>Western Sahara</option>
                                    <option value="Yemen" {{ ( $client->country == 'Yemen') ? 'selected' : '' }}>Yemen</option>
                                    <option value="Zambia" {{ ( $client->country == 'Zambia') ? 'selected' : '' }}>Zambia</option>
                                    <option value="Zimbabwe" {{ ( $client->country == 'Zimbabwe') ? 'selected' : '' }}>Zimbabwe</option>
                                    </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Occupation</label>
                                <div class="col-8">
                                  <input id="name" name="occupation" placeholder="Occupation" class="form-control here" type="text" value="{{$client->occupation}}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Lead Source</label>
                                <div class="col-8">
                                  <input id="name" name="leadsource" placeholder="Lead Source" class="form-control here" type="text" value="{{$client->leadsource}}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Traded</label>
                                <div class="col-8">
                                  <input type="radio" value="yes" name="traded" {{ ( $client->traded == 'yes') ? 'checked' : '' }} disabled> YES
                                  <input type="radio" value="no" name="traded" {{ ( $client->traded == 'no') ? 'checked' : '' }} disabled> NO
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button id="triggerEdit" type="button" class="btn btn-secondary">Edit Profile</button>
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
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

function enableEdit() {
    $("#editClientForm input:disabled, select:disabled, select:disabled").each(function () {
       $(this).removeAttr('disabled');
    });

    $('#triggerEdit').hide();
    $('#editButton').show();
    $('#cancelButton').show();
}

function enableEditEmail() {
    $("#editEmailForm input[type='email']:disabled").each(function () {
       $(this).removeAttr('disabled');
    });

    $('#triggerEditEmail').hide();
    $('#editButtonEmail').show();
    $('#cancelButtonEmail').show();
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


      $('#editButtonEmail').hide();
      $('#cancelButtonEmail').hide();
      $("#triggerEditEmail").click(function() {
        enableEditEmail();
      });
  });
</script>
