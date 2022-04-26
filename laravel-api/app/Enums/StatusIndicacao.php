<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusIndicacao extends Enum
{
    const Iniciada = ['num' => 1, 'desc' => 'Iniciada'];
    const Em_processo = ['num' => 2, 'desc' => 'Em processo'];
    const Finalizada = ['num' => 3, 'desc' => 'Finalizada'];

}
