<?php

namespace CMProductions\Application\Service;

interface ApplicationService
{
    /**
     * @param null $request
     * @return mixed
     */
    public function execute($request = null);
} 