<div>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
        /* table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        } */
        td {
            padding-right: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>

            <td align="left" style="width: 40%;">
                <img src="{{ public_path().'/storage/carrera_logo.png' }}" alt="Logo" width="100" class="logo"/>
                <h3>Carrera Motor Shop and Services</h3>
                <pre>
                    https://carrera.com

                    Street 26
                    123456 City
                    Cagayan de Oro, Philippines
                </pre>
            </td>
            <td align="center">
            </td>
            <td align="right" style="width: 40%;">

                <h2>{{ $data['name'] }}</h2>
                <pre>
                    {{ $data['job_type'] }}
                    {{ $data['gender'] }}
                    {{ $data['mobile'] }}
                    {{ $data['email'] }}
                    <br /><br />
                    Date issued: {{ date('d-m-Y', strtotime($data['date_issued'])) }}
                    Employee ID: {{ $data['employee_id'] }}
                </pre>
                <h1>Status: {{ $data['payroll_status'] }}</h1>

            </td>

        </tr>

    </table>
</div>


<br/>
<div class="invoice">
    <h3>Payslip Reference #{{ $data['reference_no'] }}</h3>
    <h3>Cut off Date: {{ date("d M Y", strtotime($data['date_from'])) }} - {{ date("d M Y", strtotime($data['date_to'])) }}</h3>
    <h3>Earnings</h3>
    <table width="95%" style="border: solid black">
        <thead>
        <tr >
            <th></th>
            <th>Earnings</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody >
            @if ($data['job_type'] != 'mechanic')
                <tr>
                    <td align="right" colspan="2">Daily Rate: </td>
                    <td align="center">{{ $data['daily_rate'] }}</td>
                </tr>
                <tr>
                    <td align="right" colspan="2">Salary: </td>
                    <td align="center">{{ $data['salary'] }}</td>
                </tr>
                @if ($data['bonus'] > 0)
                <tr>
        
                    <td align="right" colspan="2">Bonus: </td>
                    <td align="center">{{ $data['bonus'] }}</td>
        
                </tr>
                @endif
                @if ($data['overtime_hrs'] > 0)
                <tr>
        
                    <td align="right" colspan="2">Overtime: </td>
                    <td align="center">{{ $data['overtime_amount'] }}</td>
        
                </tr>
                @endif
                <tr>
                    <td colspan="2" align="right" style="font-weight: bold;">Gross Salary(with overtime or bonus or without) </td>
                    {{-- <td align="left">Net Salary</td> --}}
                    <td class="gray" align="center" style="font-weight: bold;">{{ abs($data['gross_salary']) }}</td>
                </tr>
            @else
                <tr>
                    <td align="right" colspan="2">Salary: </td>
                    <td align="center">Per Services</td>
                </tr>
                <tr>
                    <td colspan="2" align="right" style="font-weight: bold;">Gross Salary </td>
                    {{-- <td align="left">Net Salary</td> --}}
                    <td class="gray" align="center" style="font-weight: bold;">{{ abs($data['gross_salary']) }}</td>
                </tr>   

            @endif
            
        </tbody>

        {{-- <tfoot>
        <tr>
            <td colspan="1"></td>
            <td align="left">Net Salary</td>
            <td class="gray">{{ abs($data['net_salary']) }}</td>
        </tr>
        </tfoot> --}}
    </table>
</div>

<div class="invoice">
    <h3>Deductions</h3>
    <table width="95%" style="border: solid black">
        <thead>
        <tr >
            <th></th>
            <th>Deductions</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody >
            @if ($data['job_type'] != 'mechanic')
            <tr>
                <tr>
                    <td align="right" colspan="2">Leave Amount </td>
                    <td align="center">{{ $data['leave_amount'] }}</td>
                </tr>
                <tr>
                    <td align="right">Contributions </td>
                    <td align="right">SSS: </td>
                    <td align="center">{{ $data['sss'] }}</td>
                </tr>
                <tr>
                    <td align="right">Contributions </td>
                    <td align="right">Philhealth: </td>
                    <td align="center">{{ $data['philhealth'] }}</td>
                </tr>
                <tr>
                    <td align="right">Contributions </td>
                    <td align="right">Pag-ibig: </td>
                    <td align="center">{{ $data['pag_ibig'] }}</td>
                </tr>
            </tr>
            @endif
            
            @if ($data['late'] > 0)
            <tr>

                <td align="right" colspan="2">Late Amount: </td>
                <td align="center">{{ $data['late_amount'] }}</td>

            </tr>
            @endif
            @if ($data['absences'] > 0)
            <tr>

                <td align="right" colspan="2">Absences Amount: </td>
                <td align="center">{{ $data['absences_amount'] }}</td>

            </tr>
            @endif
            <tr>
                <td colspan="2" align="right" style="font-weight: bold;">Total Deductions(With or Without Assigned Deductions) </td>
                {{-- <td align="left">Net Salary</td> --}}
                <td class="gray" align="center" style="font-weight: bold;">{{ abs($data['total_deductions']) }}</td>
            </tr>
        </tbody>

        {{-- <tfoot>
        <tr>
            <td colspan="1"></td>
            <td align="left">Net Salary</td>
            <td class="gray">{{ abs($data['net_salary']) }}</td>
        </tr>
        </tfoot> --}}
    </table>
</div>
<div class="invoice">
    
    <h3>Net Pay</h3>
    <table width="95%" style="border: solid black">
        <thead>
        <tr >
            <th colspan="2"></th>
            <th>Net Amount</th>
        </tr>
        </thead>
        <tbody >
        <tr>
            <td colspan="2" align="right" style="font-weight: bold;">Net Salary </td>
            {{-- <td align="left">Net Salary</td> --}}
            <td class="gray" align="center" style="font-weight: bold;">{{ abs($data['net_salary']) }}</td>
        </tr>
        </tbody>

        {{-- <tfoot>
        <tr>
            <td colspan="1"></td>
            <td align="left">Net Salary</td>
            <td class="gray">{{ abs($data['net_salary']) }}</td>
        </tr>
        </tfoot> --}}
    </table>
</div>


<div class="information" style="position: absolute; bottom: 0; width: 100%;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Carrera Motor Shop and Services
            </td>
        </tr>

    </table>
</div>
</body>
</html>
</div>