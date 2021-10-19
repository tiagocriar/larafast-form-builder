<?php

namespace {

    use Fastponto\LaravelFormBuilder\Events\AfterFieldCreation;
    use Fastponto\LaravelFormBuilder\Events\AfterFormCreation;
    use Fastponto\LaravelFormBuilder\Form;
    use Fastponto\LaravelFormBuilder\FormBuilder;
    use Fastponto\LaravelFormBuilder\FormHelper;

    class FormBuilderValidationTest extends FormBuilderTestCase
    {
        public function setUp(): void
        {
            parent::setUp();
            $this->app
                ->make('Illuminate\Contracts\Http\Kernel')
                ->pushMiddleware('Illuminate\Session\Middleware\StartSession');
        }

        public function testItValidatesWhenResolved()
        {
            Route::post('/test', TestController::class.'@validate');

            $this->post('/test', ['email' => 'foo@bar.com'])
                ->assertRedirect('/')
                ->assertSessionHasErrors(['name']);
        }

        public function testItDoesNotValidateGetRequests()
        {
            Route::get('/test', TestController::class.'@validate');

            $this->get('/test', ['email' => 'foo@bar.com'])
                ->assertStatus(200);
        }
    }
}
