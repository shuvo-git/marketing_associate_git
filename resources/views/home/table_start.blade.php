
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-valign-middle table-dt-list" id="{{$table_id}}">
                <thead>
                    <tr>
                        
                        @if ($table_id=="table_list" && auth()->user()->getRoleName->role_short_name!=='rm')
                        <th></th>
                        @endif
                        <th>Applicant</th>
                        <th>Branch</th>
                        <th>Contact</th>
                        
                        @if ($table_id==="table_list" || 
                            $table_id==="table_list_accepted")
                            <th>Gender</th>
                        @endif

                        @if ($table_id==="table_list_declined")
                            <th>Declined By</th>
                            <th>Remarks/Reason</th>
                        @endif

                        @if ($table_id==="table_list_rm_assigned")
                            <th>RM Name</th>
                            <th>RM Employee ID</th>
                        @endif

                        @auth
                        @if ( (auth()->user()->getRoleName->role_short_name=='br' && $table_id==="table_list_rm_assigned" )||
                        auth()->user()->getRoleName->role_short_name=='rm')
                            <th>Bank Account</th>
                            @endif
                        @endauth


                        <th>Status</th>
                        <th class="text-right py-0 align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>