<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download</title>

    <style>
        /*********************Color *******************************/
        .bg-black{
            background-color: black;
        }

        /*********************Margin *******************************/
        .ml-6{
            margin-right: 60px
        }
        .ml-2{
            margin-right: 20px
        }
        .ml-1{
            margin-right: 10px
        }
        .ml-0{
            margin-right: 0
        }
        .mr-6{
            margin-right: 60px
        }
        .mr-2{
            margin-right: 20px
        }
        .mr-1{
            margin-right: 10px
        }
        .mr-0{
            margin-right: 0
        }
        .mt-2{
            margin-top: 20px
        }

        /*********************padding *******************************/
        .pl-6{
            padding-left: 60px
        }
        .pl-2{
            padding-left: 20px
        }
        .pl-1{
            padding-left: 10px
        }
        .pr-6{
            padding-right: 60px
        }
        .py-2{
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .py-1{
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .px-1{
            padding-left: 5px;
            padding-right: 5px;
        }
        .px-0-1{
            padding-left: 2px;
            padding-right: 2px;
        }
        .pt-2{
            padding-top: 20px
        }
        .pt-1{
            padding-top: 10px
        }
        .pt-0-5{
            padding-top: 5px
        }

        /*******************Layout****************************/
        .page-break {
            page-break-after: always;
        }
        .center{
            text-align: center;
        }
        .flex{
            display: flex;
            margin: auto;
        }

        /*******************Font****************************/
        .bold{
            font-weight: bold;
        }
        .text-s-1{

            font-size: 9px;
        }

        /*******************Table style****************************/
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
        }

        .styled-table th,
        .styled-table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .styled-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Set fixed width for columns */
        .styled-table th:nth-child(1),
        .styled-table td:nth-child(1) {
            width: 5%; /* Adjust as needed */
        }

        .styled-table th:nth-child(2),
        .styled-table td:nth-child(2) {
            width: 30%; /* Adjust as needed */
        }

        .styled-table th:nth-child(3),
        .styled-table td:nth-child(3) {
            width: 40%; /* Adjust as needed */
        }

        .styled-table th:nth-child(4),
        .styled-table td:nth-child(4) {
            width: 25%; /* Adjust as needed */
            white-space: normal; /* Wrap content */
        }

        /* Style the rating text */
        .styled-table td:nth-child(4) span {
            font-size: 14px;
            color: #666666;
        }

    </style>
</head>
<body>
<div>
    <div class="page-break">
        <div>
            <div class="flex">
                <div>
{{--                    <img src="{{ public_path('images/logo.png') }}" class="logo" alt="Logo">--}}
                </div>

                <div class="center">
                    <h2>CATHOLIC HEALTH SERVICE TRUST, GHANA</h2>
                    <h3>ANNUAL PERFORMANCE APPRAISAL FORM</h3>
                    <h5>FACILITY NAME: {{ $record->department->name }}</h5>
                </div>
            </div>

            <p>Period of Appraisal:  From (Month & Year) {{$record->performanceAndDevelopmentPlan->created_at ? $record->performanceAndDevelopmentPlan->created_at->format('M Y'): 'No date'}} TO  {{$record->appraiserComment->updated_at ? $record->appraiserComment->updated_at->format('M Y') : 'No Date'}}</p>

            <p>Date of this Review: {{$record->appraiserComment->updated_at ? $record->appraiserComment->updated_at->format('M Y') : 'No Date'}}</p>
        </div>

        <div>
            <h5 class="margin-sm">SECTION A</h5>
            <p>Personal Information (to be completed by the Appraisee):</p>
            <p>Staff ID Number: {{$record->userDetail->staff_id }}</p>

            <div>
                <div class="margin-sm">
                    <p><span class="pr-6">SurName: {{$record->userDetail->surname}}</span>
                        <span class="pr-6">Date of Birth: {{$record->userDetail->date_of_birth}}</span>
                    </p>
                    <p>
                        <span class="pr-6">Other Names: {{$record->userDetail->other_names}}</span>
                        <span>Sex / Gender: {{$record->userDetail->sex}}</span>
                    </p>
                    <p>
                        <span>Name of Directorate/Department/Unit: {{$record->department->name}}</span>
                    </p>
                </div>
            </div>
            <div>
                <p><span class="pr-6">Diocese: {{$record->userDetail->diocese}}</span>
                    <span class="pr-6">District: {{$record->userDetail->district}}</span>
                    <span>Sub-District: {{$record->userDetail->sub_district}}</span>
                </p>
            </div>
        </div>
        <div class="mt-2 bg-black pt-0-5"></div>

        <div>
            <h5 class="center">Date should be completed as dd/mm/yy</h5>
            <p><span class="pr-6">Date of 1st Appointment: {{$record->userDetail->first_appointment_date}}</span>
                <span>Date of Current Appointment: {{$record->userDetail->current_appointment_date}}</span>
            </p>
            <p>Current Grade: {{$record->userDetail->current_grade}}</p>
            <p><span class="pr-6">Professional Category: {{$record->userDetail->professional_category}}</span>
                <span>Specialty: {{$record->userDetail->specialty}}</span>
            </p>
{{--            Basic Qualification (Professional/Academic)					Year:--}}

{{--            Additional Qualification:		                 			  Year:--}}
            <p><span class="pr-6">Basic Qualification (Professional/Academic): {{$record->userDetail->basic_qualification}}</span>
                <span>Year: {{$record->userDetail->basic_qualification_year}}</span>
            </p>
            <p><span class="pr-6">Additional Qualification: {{$record->userDetail->additional_qualification}}</span>
                <span>Year: {{$record->userDetail->additional_qualification_year}}</span>
            </p>

            <p><span class="pr-6">Current Salary Level: {{$record->userDetail->salary_level}}</span>
                <span>Current Step: {{$record->userDetail->current_step}}</span>
            </p>

        </div>
    </div>

{{--------------------    Page two  ----------------------}}
    <div class="page-break">
        <div><p><span class="bold">SECCTION B: </span>	SETTING OBJECTIVES AND ASSESSMENT OF PERFORMANCE</p>
            <p>(to be completed by the Appraiser / Supervising Officer)</p>
        </div>
        <div>
            <table class="styled-table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Agreed  Objectives (List <br> between 3 to 5 <br> objectives for the period</td>
                        <td>Main Activities/ Tasks (to <br>achieve objectives & targets)</td>
                        <td>Rating (mark with a V symbol)<br>
                            <span class="text-s-1">
                                5. Far exceeded targets <br>
                                4. Exceeds target <br>
                                3. Met all target <br>
                                2. Met some targets 3 out of 5 <br>
                                1. Met less/none of targets 2 or less
                            </span></td>
                    </tr>
                </thead>
                <tbody>
                @foreach($record->performanceAssessment as $performanceAssessmentItem)
                    <tr>
                        <td>{{$loop->iteration}}
                        </td>
                        <td>{{$performanceAssessmentItem->objectives}}</td>
                        <td>{{$performanceAssessmentItem->activities}}</td>
                        <td>{{$performanceAssessmentItem->Rating}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <p>Total score (Q ) over number of targets (N)  Q/N =  {{$record->result->current_performance}}</p>
        </div>


    </div>
</div>
</body>
</html>
