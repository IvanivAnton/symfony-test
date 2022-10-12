<?php

namespace App\Requests;

use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class BaseRequest
{
    public function __construct(protected ValidatorInterface $validator, protected RequestStack $requestStack)
    {
        $this->populate();
    }

    public function validate()
    {
        $errors = $this->validator->validate($this);

        $messages = ['message' => 'validation_failed', 'errors' => []];

        foreach ($errors as $message) {
            $messages['errors'][] = [
                'property' => $message->getPropertyPath(),
                'value' => $message->getInvalidValue(),
                'message' => $message->getMessage(),
            ];
        }

        if (count($messages['errors']) > 0) {
            $response = new JsonResponse($messages);
            $response->send();

            exit;
        }
    }

    public function getRequest(): Request
    {
        return $this->requestStack->getCurrentRequest();
    }

    protected function populate(): void
    {
        if($this->getRequest()->getMethod() == 'GET') {
            $requestData = $this->getRequest()->query->all();
        } else {
            $requestData = $this->getRequest()->toArray();
        }
        foreach ($requestData as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }
}
