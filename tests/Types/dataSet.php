<?php

namespace Tests\Types;

trait dataSet
{
    public function userDataSet(): array
    {
        return [
            [123456789, true, 'bot 1', 'last name', 'my1bot'],
            [987654321, false, 'user 1', 'last name', 'anon1User'],
            [111111111, false, 'user 2', 'last name', 'anon2User'],
            [222222222, true, 'bot 2 </>', 'last name', 'my1bot'],
        ];
    }
}
