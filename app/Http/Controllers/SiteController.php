<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ElseIf_;

class SiteController extends Controller
{
    public function index()
    {
        return view('rescisão');
    }
    public function resultadoIRRF(Request $request)
    {
        $salary = floatval($request->input('salary'));
        $dependents = intval($request->input('dependents')) * 189.59;
        $othersDiscounts = floatval($request->input('Discounts'));
        // cálculo do Discountso do INSS
        if ($salary <= 1320.00) {
            $inssDiscounts = $salary * 0.075;
            $inssBaseAliquot = 7.5;
        } elseif ($salary <= 2571.29) {
            $inssDiscounts = ($salary * 0.090) - 19.80;
            $inssBaseAliquot = 9.0;
        } elseif ($salary <= 3856.94) {
            $inssDiscounts = ($salary * 0.120) - 96.94;
            $inssBaseAliquot = 12.0;
        } elseif ($salary <= 7507.49) {
            $inssDiscounts = ($salary * 0.140) - 174.08;
            $inssBaseAliquot = 14.0;
        } else {
            $inssDiscounts = 876.97;
            $inssBaseAliquot = 'TETO';
        };

        $bcIRRF = $salary - $othersDiscounts - $dependents - $inssDiscounts;
        //Cálculo do IRRF
        if ($bcIRRF <= 2112.00) {
            $irrfDiscounts = 0;
            $irrfBaseAliquot = 'ISENTO';
        } elseif ($bcIRRF <= 2862.65) {
            $irrfDiscounts = $bcIRRF * 0.075 - 158.40;
            $irrfBaseAliquot = 7.5;
        } elseif ($bcIRRF <= 3751.05) {
            $irrfDiscounts = $bcIRRF * 0.150 - 370.40;
            $irrfBaseAliquot = 12.0;
        } elseif ($bcIRRF <= 4664.68) {
            $irrfDiscounts = $bcIRRF * 0.225 - 651.73;
            $irrfBaseAliquot = 15.0;
        } else {
            $irrfDiscounts = $bcIRRF * 0.275 - 884.96;
            $irrfBaseAliquot = 27.5;
        };
        //adicionando alíquotas efetivas 
        $inssEffectiveAliquot = $inssDiscounts / $salary * 100;
        $irrfEffectiveAliquot = $irrfDiscounts / $salary * 100;
        //Cálculo dos somatórios
        $discountsValue = $othersDiscounts + $inssDiscounts + $irrfDiscounts;
        $netSalary = $salary - $discountsValue;
        //adicionando os campos de resumo
        $resume = number_format($irrfDiscounts / $salary * 100, 2, ',', '.') . '%';

        $IRRF = [
            'resume' => $resume,
            'salary' => "R$ " . number_format($salary, 2, ',', '.'),
            'othersDiscounts' => "R$ " . number_format($othersDiscounts, 2, ',', '.'),
            'inssDiscounts' => "R$ " . number_format($inssDiscounts, 2, ',', '.'),
            'inssBaseAliquot' => ($salary <= 7507.59 ? number_format($inssBaseAliquot, 1, ',', '.') . "%" : 'TETO'),
            'inssEffectiveAliquot' => number_format($inssEffectiveAliquot, 1, ',', '.') . "%",
            'irrfDiscounts' => "R$ " . number_format($irrfDiscounts, 2, ',', '.'),
            'irrfBaseAliquot' => ($bcIRRF <= 2112.00 ? 'ISENTO' : number_format($irrfBaseAliquot, 1, ',', '.') . "%"),
            'irrfEffectiveAliquot' => number_format($irrfEffectiveAliquot, 1, ',', '.') . "%",
            'discountsValue' => "R$ " . number_format($discountsValue, 2, ',', '.'),
            'netSalary' => "R$ " . number_format($netSalary, 2, ',', '.'),
        ];

        return view('resultado_IRRF', $IRRF);
    }
    public function resultadoINSS(Request $request)
    {
        $salary = floatval($request->input('salary'));

        if ($salary <= 1320.00) {
            $inssDiscounts = $salary * 0.075;
            $inssBaseAliquot = 7.5;
        } elseif ($salary <= 2571.29) {
            $inssDiscounts = ($salary * 0.090) - 19.80;
            $inssBaseAliquot = 9.0;
        } elseif ($salary <= 3856.94) {
            $inssDiscounts = ($salary * 0.120) - 96.94;
            $inssBaseAliquot = 12.0;
        } elseif ($salary <= 7507.49) {
            $inssDiscounts = ($salary * 0.140) - 174.08;
            $inssBaseAliquot = 14.0;
        } else {
            $inssDiscounts = 876.97;
            $inssBaseAliquot = 'TETO';
        };

        $inssEffectiveAliquot = $inssDiscounts / $salary * 100;
        $resume = number_format($inssDiscounts / $salary * 100, 2, ',', '.') . '%';
        $netSalary = $salary - $inssDiscounts;

        $INSS = [
            'resume' => $resume,
            'salary' => "R$ " . number_format($salary, 2, ',', '.'),
            'inssDiscounts' => "R$ " . number_format($inssDiscounts, 2, ',', '.'),
            'inssBaseAliquot' => ($salary <= 7507.59 ? number_format($inssBaseAliquot, 1, ',', '.') . "%" : 'TETO'),
            'inssEffectiveAliquot' => number_format($inssEffectiveAliquot, 1, ',', '.') . "%",
            'netSalary' => "R$ " . number_format($netSalary, 2, ',', '.'),
        ];

        return view('resultado_INSS', $INSS);
    }
    public function resultadoFGTS(Request $request)
    {
        $salary = floatval($request->input('salary'));
        $deposit = $salary * 0.08;
        $startFGTS = floatval($request->input('startFGTS'));
        $inicialDate = $request->input('inicialDate');
        $endDate = $request->input('endDate');
        $interest = $request->input('interest');
        //convertendo tempo de meses em valores interios
        $inicial = Carbon::parse($inicialDate);
        $end = Carbon::parse($endDate);
        $monthsDifference = $end->diffInMonths($inicial);
        //condicionais referentes aos juros
        if ($request->input('interest') == 'on') {
            $annualInterest = 3;
            $monthlyInterest = pow(1 + ($annualInterest / 100),  1 / 12) - 1;
            $mountDeposit = 0;
            $mountFGTS = 0;
            for ($i = 1; $i <= $monthsDifference; $i++) {
                $mountDeposit +=  $deposit * pow($monthlyInterest + 1, $i);
            }
            $mountFGTS = $startFGTS * pow($monthlyInterest + 1, $monthsDifference);
            $mountTotal = $mountDeposit + $mountFGTS;
        } else {
            $mountDeposit = $deposit * $monthsDifference;
            $mountFGTS = $startFGTS;
            $mountTotal = $mountDeposit + $mountFGTS;
        }




        $FGTS = [
            'salary' => 'R$ ' . number_format($salary, 2, ',', '.'),
            'mountSalary' => 'R$ ' . number_format($deposit * $monthsDifference, 2, ',', '.'),
            'interest' => $interest,
            'deposit' => 'R$ ' . number_format($deposit, 2, ',', '.'),
            'startFGTS' => 'R$ ' . number_format($startFGTS, 2, ',', '.'),
            'mountDeposit' => 'R$ ' . number_format($mountDeposit, 2, ',', '.'),
            'monthlyInterest' => $monthlyInterest ?? null,
            'months' => $monthsDifference,
            'checkbox' => $request->input('interest'),
            'mountFGTS' =>  'R$ ' . number_format($mountFGTS, 2, ',', '.'),
            'mountTotal' =>  'R$ ' . number_format($mountTotal, 2, ',', '.'),


        ];
        return view('resultado_FGTS', $FGTS);
    }

    public function resultadoFerias(Request $request)
    {
        $days = intval($request->input('days')) / 30;
        $salary = floatval($request->input('salary'));
        $overtime = floatval($request->input('overtime')) ?? null;
        $grossSalary = ($salary + $overtime) * $days;
        $thirdVacation = $grossSalary / 3;
        $allowanceChoice = $request->input('salaryAllowance');
        $allowance = $salary + $overtime;
        
        $salaryAllowance = (floatval($request->input('salaryAllowance')) / 3) * $allowance;
        $thirdAllowance = $salaryAllowance / 3;
        $advanceChoice = $request->input('advance');
        $advance = floatval($request->input('advance')) / 2 * $salary;
        $dependents = intval($request->input('dependents')) * 189.59;
        $earnings = $grossSalary + $thirdVacation + $salaryAllowance + $thirdAllowance + $advance;
        $bcDiscounts = $grossSalary + $thirdVacation;
        // cálculo do Discountso do INSS
        $inssDiscounts = $bcDiscounts <= 1320.00 ? $bcDiscounts * 0.075 :
                        ($bcDiscounts <= 2571.29 ? $bcDiscounts * 0.090 - 19.80 :
                        ($bcDiscounts <= 3856.94 ? $bcDiscounts * 0.120 - 96.67 :
                        ($bcDiscounts <= 7507.49 ? $bcDiscounts * 0.140 - 174.08 : 876.97)));
        $inssAliquot = $inssDiscounts/ $bcDiscounts;

        $bcIRRF = $bcDiscounts - $dependents - $inssDiscounts;
        // //Cálculo do IRRF
        $irrfDiscounts = $bcIRRF <= 2112.00 ? 0 :
                        ($bcIRRF <= 2862.65 ? $bcIRRF * 0.075 - 158.40 :
                        ($bcIRRF <= 3751.05 ? $bcIRRF * 0.150 - 370.40 :
                        ($bcIRRF <= 4664.68 ? $bcIRRF * 0.225 - 651.73 :
                        ($bcIRRF >  4664.68 ? $bcIRRF * 0.275 - 884.96 : null))));
        $irrfAliquot =  $irrfDiscounts / $bcIRRF;
        $totalDiscounts = $irrfDiscounts + $inssDiscounts;
        $netEarnings = $earnings - $totalDiscounts;

        $vacations = [
            'grossSalary' => 'R$ ' . number_format($grossSalary, 2, ',', '.'),
            'thirdVacation' => 'R$ ' . number_format($thirdVacation, 2, ',', '.'),
            'allowanceChoice' => $allowanceChoice,
            'salaryAllowance' => 'R$ ' . number_format($salaryAllowance, 2, ',', '.'),
            'thirdAllowance' => 'R$ ' . number_format($thirdAllowance, 2, ',', '.'),
            'advance' =>  'R$ ' . number_format($advance, 2, ',', '.'),
            'advanceChoice' => $advanceChoice,
            'inssDiscounts' => 'R$ ' . number_format($inssDiscounts, 2, ',', '.'),
            'irrfDiscounts' => 'R$ ' . number_format($irrfDiscounts, 2, ',', '.'),
            'earnings' => 'R$ ' . number_format($earnings, 2, ',', '.'),
            'totalDiscounts' => 'R$ ' . number_format($totalDiscounts, 2, ',', '.'),
            'netEarnings' => 'R$ ' . number_format($netEarnings, 2, ',', '.'),
            'days' => $days * 30,
            'salary' => 'R$ ' . number_format($salary, 2, ',', '.'),
            'overtime' => 'R$ ' . number_format($overtime, 2, ',', '.'),
            'bcIRRF' => 'R$ ' . number_format($bcIRRF, 2, ',', '.'),
            'inssAliquot' => number_format($inssAliquot * 100, 2, ',', '.')."%",
            'irrfAliquot' => number_format($irrfAliquot * 100, 2, ',', '.')."%",
        ];

        return view('resultado_ferias', $vacations);
    }
    public function resultadoSeguro(Request $request)
    {
        $lastMonth = floatval($request->input('lastMonth'));
        $penultimateMonth = floatval($request->input('penultimateMonth'));
        $antepenultimateMonth = floatval($request->input('antepenultimateMonth'));
        $average = ($lastMonth + $penultimateMonth + $antepenultimateMonth) / 3;
        $months = intval($request->input('months'));
        $choices = $request->input('choices');
        $secureParcels = $average <= 1320.00 / 0.8 ? 1320 : 
                        ($average <= 1968.36 ? $average * 0.8 : 
                        ($average <= 3280.93 ? (($average - 1968.36) * 0.5) + 1574.69 :
                        2230.97));

        //condicionais relacionadas ao input parcel 
        switch ($choices) {
            case '1':
                $countParcels =  $months <= 11 ? 0 : 
                                ($months <= 23 ? 4 :
                                ($months >= 24 ? 5 : 
                                null));
                $months >= 12 ? $secureParcels : $secureParcels = 0;
                break;
            case '2':
                $countParcels =  $months <= 8 ? 0 : 
                $countParcels =  $months <= 11 ? 3 : 
                                ($months <= 13 ? 4 : 
                                ($months >= 24 ? 5 : 
                                0));
                $months >= 9 ? $secureParcels : $secureParcels = 0;
                break;
            case '3':
                $countParcels =  $months <= 5 ? 0 : 
                $countParcels =  $months <= 11 ? 3 : 
                                ($months <= 23 ? 4 : 
                                ($months >= 24 ? 5 : 
                                0));
                $months >= 6 ? $secureParcels : $secureParcels = 0;
                break;
            }
        $mountParcels = $secureParcels * $countParcels;
        $secure = [
            'average' => 'R$ '.number_format($average,2,',','.'),
            'choices' => $choices,
            'months' => $months,
            'countParcels' => $countParcels,
            'secureParcels' =>  'R$ '.number_format($secureParcels,2,',','.'),
            'mountParcels' => 'R$ '.number_format($mountParcels,2,',','.'),
        ];
        return view('resultado_seguro', $secure);
    }
    public function resultadoRescisao(Request $request)
    {
        $salary = floatval($request->input('salary'));
        $advance = $request->input('advance');
        $admissionDate = $request->input('admissionDate');
        $endDate = $request->input('endDate');
        $reason = $request->input('reason');
        $expiredVacation = $request->input('expiredVacation');
        $dependents = intval($request->input('dependents')) * 189.59;
        // dias trabalhados no mês da demissão 
        $date = Carbon::parse($endDate);
        $dateStart = Carbon::parse($admissionDate);
        $dayNumber = $date->day;
        $dayAdmission = $dateStart->day;
        $daysOnMonth = $dayNumber - $dayAdmission;
        $monthNumber = $date->month;
        $salaryMonth = ($salary * $dayNumber) / 30;
        //convertendo tempo a diferença de dias em valores inteiros
        $admission = Carbon::parse($admissionDate);
        $end = Carbon::parse($endDate);
        $endDayOne = $end->format('Y-01-01');
        $daysDifference = $admission->diffInDays($end);
        $monthsDifference = intval($admission->diffInMonths($end));
        $yearsDifference = $admission->diffInYears($end);
        //possuí férias vencidas? 
        
        $expiredSalary = $expiredVacation === 'on' ? $salary :  0;

        //calculando as férias proporcionais no ano da demissão
        if ($daysOnMonth >= 15) {
            $monthsWorked = $monthsDifference != 0 ? $monthsDifference + 1 % 12 : 
                            ($monthsDifference + 1 == 12 ? 12 :null); 
        }else {
            $monthsWorked = $monthsDifference != 0 ? ($monthsDifference % 12 ) : null;
        }
        $vacation= $monthsWorked * $salary / 12;
        $thirdVacation= ($vacation + $expiredSalary) / 3;
        //13º proporcional referente ao ano de demissão
        $workOnYear = $dayNumber >= 15 ? $monthNumber : $monthNumber - 1;
        $thirteenth = $workOnYear * $salary / 12;
        #cálculo do aviso prévio
        $daysOfAdvance =  0;
        $advanceAid = 0;
        
        if ($advance === '2'){
            switch ($reason) {
                case $reason != '4':
                    $daysOfAdvance = $yearsDifference * 3 + 30;
                    $advanceAid = ($daysOfAdvance * $salary) / 30;
                    break;
                    
                default:
                    $daysOfAdvance =  15;
                    $advanceAid = ($daysOfAdvance * $salary) / 30;
                    break;
            }
        }

        //somatório das verbas rescisórias
        $sum = $salaryMonth + $vacation + $expiredSalary + $thirdVacation + $thirteenth + $advanceAid;
        //deduções (parte mais fácil)


        // cálculo do disconto do INSS
        $inssDiscounts = $salaryMonth <= 1320.00 ? $salaryMonth * 0.075 :
                        ($salaryMonth <= 2571.29 ? $salaryMonth * 0.090 - 19.80 :
                        ($salaryMonth <= 3856.94 ? $salaryMonth * 0.120 - 96.67 :
                        ($salaryMonth <= 7507.49 ? $salaryMonth * 0.140 - 174.08 : 876.97)));
        // cálculo do disconto do INSS
        $inssVacationDiscounts = $thirteenth <= 1320.00 ? $thirteenth * 0.075 :
                                ($thirteenth <= 2571.29 ? $thirteenth * 0.090 - 19.80 :
                                ($thirteenth <= 3856.94 ? $thirteenth * 0.120 - 96.67 :
                                ($thirteenth <= 7507.49 ? $thirteenth * 0.140 - 174.08 : 876.97)));

        // //Cálculo do IRRF
        $bcIRRF = $salaryMonth - $dependents - $inssDiscounts;
        $irrfDiscounts = $bcIRRF <= 2112.00 ? 0 :
                        ($bcIRRF <= 2862.65 ? $bcIRRF * 0.075 - 158.40 :
                        ($bcIRRF <= 3751.05 ? $bcIRRF * 0.150 - 370.40 :
                        ($bcIRRF <= 4664.68 ? $bcIRRF * 0.225 - 651.73 :
                        ($bcIRRF >  4664.68 ? $bcIRRF * 0.275 - 884.96 : null))));
        //cálculo das alíquotas efetivas
        $inssEffetiveAliquot = $inssDiscounts/$salaryMonth * 100;
        $inssVacationEffetiveAliquot = $vacation != 0 ? $inssVacationDiscounts/$vacation * 100 : 0 ;
        $irrfEffetiveAliquot = $irrfDiscounts/$salaryMonth * 100;
        //soma das deduções
        $sumDeductions = - $irrfDiscounts - $inssDiscounts -$inssVacationDiscounts;
        // parte do FGTS
        // parcelas mensais depositadas do FGTS
        $monthsfgts = $daysOnMonth >= 15 ? $monthsDifference + 1 : $monthsDifference  ;
        $fgtsDeposit = $salary * 0.08 * $monthsfgts;
        //saldo do salário no mês da rescisão do contrato
        $fgtsSalaryMonth = $salaryMonth * 0.08 ;
        //fgts proporcional ao ano de encerramento do contrato
        $thirteenthFGTS = $salary * 0.08 * $workOnYear / 12;
        // n tem FGTS: 2, 3, 5 , 6 , 7 E 8
        // n tem FGTS: 2, 3, 5 , 6 , 7 E 8
        // do aviso prévio

            switch ($reason) {
                case $reason === '1':
                    $percentage = 0.4;
                    $fine = ($fgtsSalaryMonth + $fgtsDeposit + $thirteenthFGTS) * $percentage;
                    break;
                
                case $reason === '4':
                    if ($advance === '2'){
                        $percentage = 0.2;
                        $fine = ($fgtsSalaryMonth + $fgtsDeposit + $thirteenthFGTS) * $percentage;
                    }else {
                        $percentage = 0.4;
                        $fine = ($fgtsSalaryMonth + $fgtsDeposit + $thirteenthFGTS) * $percentage;
                    }
                    break;
                
                default:
                    $percentage = 0;
                    $fine = 0;
                    break;
            }
        //soma do FGTS devido

        $sumFGTS = $reason === "1"  || $reason === "4" ? $fine + $fgtsSalaryMonth + $fgtsDeposit + $thirteenthFGTS: 0;

        //somatório total
        $sumSubs = $sum + $sumFGTS + $sumDeductions;


        $termination = [
            'daysDifference' => $daysDifference,
            'monthsDifference' => $monthsDifference,
            'yearsDifference' => $yearsDifference,
            'admission' => $admissionDate,
            'end' => $endDate,
            'endDayOne' => $endDayOne,
            'dayNumber' => $dayNumber,
            'monthsWorked' => $monthsWorked,
            'daysOfAdvance' => $daysOfAdvance,
            'expiredVacation' => $expiredVacation,
            'advance' => $advance,
            'reason' => $reason,
            'salaryMonth' => 'R$ '.number_format($salaryMonth,2,',','.'),
            'expiredSalary' => 'R$ '.number_format($expiredSalary,2,',','.'),
            'vacation' => 'R$ '.number_format($vacation,2,',','.'), 
            'thirdVacation' => 'R$ '.number_format($thirdVacation,2,',','.'), 
            'thirteenth' => 'R$ '.number_format($thirteenth,2,',','.'), 
            'advanceAid' => 'R$ '.number_format($advanceAid,2,',','.'), 
            'sum' => 'R$ '.number_format($sum,2,',','.'), 
            'inssDiscounts' => 'R$ '.number_format($inssDiscounts,2,',','.'), 
            'inssVacationDiscounts' => 'R$ '.number_format($inssVacationDiscounts,2,',','.'), 
            'irrfDiscounts' => 'R$ '.number_format($irrfDiscounts,2,',','.'), 
            'inssEffetiveAliquot' => number_format($inssEffetiveAliquot,2,',','.')."%",
            'inssVacationEffetiveAliquot' => number_format($inssVacationEffetiveAliquot,2,',','.')."%",
            'irrfEffetiveAliquot' => number_format($irrfEffetiveAliquot,2,',','.')."%",
            'sumDeductions' => 'R$ '.number_format($sumDeductions,2,',','.'), 
            'fgtsDeposit' => 'R$ '.number_format($fgtsDeposit,2,',','.'), 
            'monthsfgts' => $monthsfgts,
            'fgtsSalaryMonth' => 'R$ '.number_format($fgtsSalaryMonth,2,',','.'),
            'thirteenthFGTS' => 'R$ '.number_format($thirteenthFGTS,2,',','.'),
            'percentage' => number_format($percentage * 100 ,0,',','.')."%",
            'fine' => 'R$ '.number_format($fine,2,',','.'),
            'sumFGTS' => 'R$ '.number_format($sumFGTS,2,',','.'),
            'sumSubs' => 'R$ '.number_format($sumSubs,2,',','.'),
        ];



        return view('resultado_rescisao',$termination);
    }
    public function seguro()
    {
        return view('seguro');
    }
    public function ferias()
    {
        return view('ferias');
    }
    public function FGTS()
    {
        return view('FGTS');
    }
    public function rescisao()
    {
        return view('rescisao');
    }
    public function IRRF()
    {
        return view('IRRF');
    }
    public function INSS()
    {
        return view('INSS');
    }
}
