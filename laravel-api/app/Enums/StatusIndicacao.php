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
    const Iniciada = 1;
    const Em_processo = 2;
    const Finalizada = 3;
}
