<div class="row">
    <div class="mb-3 fv-plugins-icon-container  col-12">
        <span><b>Currently Assigned User : </b> {{ $data['previous_user_fname'] }} {{ $data['previous_user_lname'] }} </span>
    </div>
</div>
<div class="row">
    <div class="mb-3 fv-plugins-icon-container  col-6">
        <label class="form-label" for="date"><b>Date : </b></label>
        <br />
        <!--<input-->
        <!--    type="text"-->
        <!--    name="date"-->
        <!--    id="date"-->
        <!--    class="form-control dob-picker"-->
        <!--    placeholder="YYYY-MM-DD"-->
        <!--    @if(isset($data['date']) && !empty($data['date']))-->
        <!--        value="{{ $data['date'] }}"-->
        <!--    @endif-->
        <!--/>-->
            @if(isset($data['date']) && !empty($data['date']))
                <span>{{ $data['date'] }}</span>
            @endif
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>

    <div class="mb-3 fv-plugins-icon-container  col-6">
    <label class="form-label" for="facility_name"><b>Facility : </b></label>
    <!--<input-->
    <!--        type="text"-->
    <!--        name="facility_name"-->
    <!--        id="{{$data['ficility']->id}}"-->
    <!--        class="form-control facility_name"-->
    <!--        @if(isset($data['ficility']) && !empty($data['ficility']))-->
    <!--            value="{{$data['ficility']->name}}"-->
    <!--        @endif-->
    <!--        readonly-->
    <!--    />-->
    <br />
        @if(isset($data['ficility']) && !empty($data['ficility']))
            <span>{{$data['ficility']->name}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="mb-3 fv-plugins-icon-container  col-12">
    <label class="form-label" for="user"><b> New Assign User :</b> </label>
        <select id="user" name="user" class="select2 form-select text-capitalize" >
            <option value="All" selected> Select User </option>
            @foreach($data['users'] as $user)
                <option value="{{$user->id}}" {{ $data['previous_user_id']==$user->id?'selected':'' }} > {{$user->first_name}} {{$user->last_name}} </option>
            @endforeach
        </select>
    </div>
    <input type="hidden" value="{{$data['room']->id}}" id="room_id" name="room_id" />
    <input type="hidden" value="{{$data['previous_user_id']}}" id="previous_user_id" name="previous_user_id" />
    <input type="hidden" value="{{$data['date']}}" id="date" name="date" />
    <input type="hidden" value="{{$data['ficility']->id}}" id="{{ $data['ficility']->id }}" name="facility_name" />
</div>
<div class="row">
    <div class="col-4"></div>
    <div class="col-2 text-end mt-2">
        <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn" id="updatedata">Submit</button>
    </div>
    <div class="col-2 text-start mt-2">
        <button
            type="reset"
            class="btn btn-label-secondary btn-reset"
            data-bs-dismiss="modal"
            aria-label="Close"
        >
            Cancel
        </button>
    </div>
    <div class="col-4"></div>
</div>    