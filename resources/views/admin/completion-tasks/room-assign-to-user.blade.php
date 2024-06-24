    <div class="row">
        <div class="mb-3 fv-plugins-icon-container  col-12">
        <label class="form-label" for="user">User</label>
            <select id="user" name="user" class="select2 form-select text-capitalize" >
                <option value="All" selected> Select User </option>
                @foreach($data['users'] as $user)
                    <option value="{{$user->id}}" {{ $data['previous_user_id']==$user->id?'selected':'' }} > {{$user->first_name}} {{$user->last_name}} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 fv-plugins-icon-container  col-6">
            <label class="form-label" for="date">Date</label>
            <input
                type="text"
                name="date"
                id="date"
                class="form-control dob-picker"
                placeholder="YYYY-MM-DD"
                @if(isset($data['date']) && !empty($data['date']))
                    value="{{ $data['date'] }}"
                @endif
            />
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>

        <div class="mb-3 fv-plugins-icon-container  col-6">
        <label class="form-label" for="facility_name">Facility</label>
        <input
                type="text"
                name="facility_name"
                id="{{$data['ficility']->id}}"
                class="form-control facility_name"
                @if(isset($data['ficility']) && !empty($data['ficility']))
                    value="{{$data['ficility']->name}}"
                @endif
                readonly
            />
        </div>
        
        <input type="hidden" value="{{$data['room']->id}}" id="room_id" name="room_id" />
        <input type="hidden" value="{{$data['previous_user_id']}}" id="previous_user_id" name="previous_user_id" />
        
        <div class="col-12 text-center mt-2">
            <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn" id="updatedata">Submit</button>
        </div>
    
    </div>   
<script src="{{ asset('public/admin') }}/assets/js/form-layouts.js"></script>