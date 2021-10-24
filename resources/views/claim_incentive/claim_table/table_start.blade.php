
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-valign-middle table-dt-list" id="{{$table_id}}">
                <thead>
                    <tr>
                        
                        @if ($table_id=='table_list')
                            <th> </th>
                        @endif
                        
                        <th>SL</th>
                        <th>User</th>
                        <th>Associate ID</th>
                        
                        @if (auth()->user()->getRoleName->role_short_name!='br')
                            <th>Branch</th>
                        @endif
                        @if (auth()->user()->getRoleName->role_short_name!='rm')
                            <th>RM</th>
                        @endif
                        <th>Claim Date</th>
                        <th>Status</th>
                        <th>Attachment</th>
                        <th class="text-right py-0 align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>