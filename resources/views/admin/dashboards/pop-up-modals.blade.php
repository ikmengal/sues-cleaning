<div class="modal fade teamabsentModal" id="teamabsentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body input-checkbox">
                <div class="text-start mb-4">
                    <h3 class="mb-2" id="modal-label">Absent Summary <button data-modal-id="teamabsentModal" data-url="{{ route('user_leaves.store') }}" class="btn btn-primary btn-sm apply-btn" disabled type="button">Apply</button></h3>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <th>
                                <div>
                                    <input id="select-all" class="form-check-input select-all" type="checkbox" />
                                </div>
                            </th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Behavior</th>
                            <th>Satus</th>
                        </thead>
                        <tbody class="table-border-bottom-0" id="team-absent-modal-content-body"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="teamhalfdayModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body input-checkbox">
               <div class="text-start mb-4">
                  <h3 class="mb-2">Half Days Summary <button data-modal-id="teamhalfdayModal" data-url="{{ route('user_leaves.store') }}" class="btn btn-primary btn-sm apply-btn" disabled type="button">Apply</button></h3>
               </div>
               <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                            <th>
                                <div>
                                    <input class="form-check-input select-all" type="checkbox" value="" id="defaultCheck1" />
                                </div>
                            </th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Behavior</th>
                            <th>Status</th>
                        </tr>
                     </thead>
                     <tbody class="table-border-bottom-0" id="half-days-summary"></tbody>
                  </table>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="teamlateinModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body input-checkbox">
               <div class="text-start mb-4">
                  <h3 class="mb-2">Late-In Summary <button data-modal-id="teamlateinModal" data-url="{{ route('user_leaves.store') }}" class="btn btn-primary btn-sm apply-btn" disabled type="button">Apply</button></h3>
               </div>
               <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                            <th>
                                <div>
                                    <input class="form-check-input select-all" type="checkbox" />
                                </div>
                            </th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Behavior</th>
                            <th>Status</th>
                        </tr>
                     </thead>
                     <tbody class="table-border-bottom-0" id="late-in-summary">
                     </tbody>
                  </table>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="teamEarlyOutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body input-checkbox">
               <div class="text-start mb-4">
                  <h3 class="mb-2">Early Out Summary <button data-modal-id="teamlateinModal" data-url="{{ route('user_leaves.store') }}" class="btn btn-primary btn-sm apply-btn" disabled type="button">Apply</button></h3>
               </div>
               <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                            <th>
                                <div>
                                    <input class="form-check-input select-all" type="checkbox" value="" id="defaultCheck1" />
                                </div>
                            </th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Behavior</th>
                            <th>Status</th>
                        </tr>
                     </thead>
                     <tbody class="table-border-bottom-0" id="early-out-summary">
                     </tbody>
                  </table>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="teamleavesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body input-checkbox">
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-start mb-4">
                            <h3 class="mb-2" id="modal-label">Team Leaves</h3>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <button data-modal-id="teamleavesModal" class="btn btn-primary approve-btn" data-status-type="status" disabled data-status-url="{{ route('user.discrepancy.status') }}">Approve</button>
                    </div>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>
                                <div>
                                    <input class="form-check-input select-all" type="checkbox" value="" id="defaultCheck1" />
                                </div>
                            </th>
                            <th>Name</th>
                            <th>Attendance Date</th>
                            <th>Behavior</th>
                            <th>Reason</th>
                            <th>Appled At</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="show-content"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="teamdiscrepancyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body input-checkbox">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-start mb-4">
                        <h3 class="mb-2" id="modal-label">Team Discrepancy</h3>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <button data-modal-id="teamdiscrepancyModal" class="btn btn-primary approve-btn" data-status-type="status" disabled data-status-url="{{ route('user.discrepancy.status') }}">Approve</button>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                <div>
                                    <input class="form-check-input select-all" type="checkbox" value="" id="defaultCheck1" />
                                </div>
                            </th>
                            <th>Name</th>
                            <th>Attendance Date Time</th>
                            <th>Type</th>
                            <th>Applied At</th>
                            <th>Reason</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="show-content"></tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="teamfilterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-start mb-4">
                    <h3 class="mb-2" id="modal-label">Team Summary</h3>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>Employee</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Punched In</th>
                                <th>Punched Out</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="show-content"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="teamModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-start mb-4">
                    <h3 class="mb-2">My Team</h3>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Joining Date</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="show-content"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="discrepancyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class=" mb-4">
                    <h3 class="mb-2" id="modal-label"></h3>
                </div>
                <span id="show-content"></span>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="leavesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-start mb-4">
                    <h3 class="mb-2" id="modal-label"></h3>
                </div>
                <span id="show-content"></span>
            </div>
        </div>
    </div>
</div>

{{-- Leave or Discrepancy Reason --}}
<div class="modal fade" id="view-reason-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered1 modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="mb-4">
                    <h3 class="mb-2" id="modal-label">Reason of Leave or Discrepancy</h3>
                </div>
                <form action="" data-modal-id="view-reason-modal" id="create-form" data-method="Post">
                    @csrf
                    <input type="hidden" name="applied_dates" id="applied_dates" value=""/>
                    <input type="hidden" name="user_slug" value="{{ Auth::user()->slug }}">
                    <input type="hidden" name="form_type" value="pop-up-modal">
                    <div class="form-group">
                        <label for="reason">Reason <span class="text-danger">*</span></label>
                        <textarea name="reason" id="reason" cols="30" rows="10" class="form-control" placeholder="Enter reason" required></textarea>
                        <span id="reason_error" class="text-danger error"></span>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 me-sm-3 me-1 data-submit waves-effect waves-light submitBtn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--<div class="modal fade teamabsentModal" id="teamabsentModal" tabindex="-1" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-lg" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body input-checkbox">-->
<!--                <div class="text-start mb-4">-->
<!--                    <h3 class="mb-2" id="modal-label">Absent Summary </h3>-->
<!--                </div>-->
<!--                <div class="table-responsive text-nowrap">-->
<!--                    <table class="table">-->
<!--                        <thead>-->
<!--                            <th>-->
<!--                                S.No-->
<!--                            </th>-->
<!--                            <th>Employee</th>-->
<!--                            <th>Date</th>-->
<!--                            <th>Type</th>-->
<!--                        </thead>-->
<!--                        <tbody class="table-border-bottom-0" id="admin-team-absent-modal-content-body"></tbody>-->
<!--                    </table>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="modal fade" id="teamhalfdayModal" tabindex="-1" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-lg" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body input-checkbox">-->
<!--               <div class="text-start mb-4">-->
<!--                  <h3 class="mb-2">Half Days Summary </h3>-->
<!--               </div>-->
<!--               <div class="table-responsive text-nowrap">-->
<!--                  <table class="table table-striped">-->
<!--                     <thead>-->
<!--                        <tr>-->
<!--                            <th>-->
<!--                                S.No-->
<!--                            </th>-->
<!--                            <th>Employee</th>-->
<!--                            <th>Date</th>-->
<!--                            <th>Type</th>-->
<!--                            <th>Punched In</th>-->
<!--                            <th>Punched Out</th>-->
<!--                        </tr>-->
<!--                     </thead>-->
<!--                     <tbody class="table-border-bottom-0" id="admin-half-days-summary"></tbody>-->
<!--                  </table>-->
<!--               </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="modal fade" id="teamlateinModal" tabindex="-1" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-lg" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body input-checkbox">-->
<!--               <div class="text-start mb-4">-->
<!--                  <h3 class="mb-2">Late-In Summary </h3>-->
<!--               </div>-->
<!--               <div class="table-responsive text-nowrap">-->
<!--                  <table class="table table-striped">-->
<!--                     <thead>-->
<!--                        <tr>-->
<!--                            <th>-->
<!--                                S.No-->
<!--                            </th>-->
<!--                            <th>Employee</th>-->
<!--                            <th>Date</th>-->
<!--                            <th>Type</th>-->
<!--                            <th>Punched In</th>-->
<!--                            <th>Punched Out</th>-->
<!--                        </tr>-->
<!--                     </thead>-->
<!--                     <tbody class="table-border-bottom-0" id="late-in-summary">-->
<!--                     </tbody>-->
<!--                  </table>-->
<!--               </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="modal fade" id="adminteamfilterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-start mb-4">
                    <h3 class="mb-2" id="modal-label">Team Summary</h3>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>Employee</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Punched In</th>
                                <th>Punched Out</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="admin-team-summary"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<input type="hidden" id="max_discrepancies" value="{{ $remaining_filable_discrepancies }}">-->
<!--<input type="hidden" id="max_leaves" value="{{ $remaining_filable_leaves }}">-->
