// ---SPECS-------------------------

describe('myApp', function () {
    var scope,
        controller;
    beforeEach(function () {
        module('myApp');
    });

    describe('CtrlHttp', function () {

        var $httpBackend,
            successCallback,
            errorCallback,
            httpController;

        beforeEach(inject(function ($rootScope, $controller, _$httpBackend_) {
            $httpBackend = _$httpBackend_;
            scope = $rootScope.$new();
            successCallback = jasmine.createSpy();
            errorCallback = jasmine.createSpy();
            httpController = $controller('CtrlHttp', {
                '$scope': scope
            });
        }));

        afterEach(function () {
            $httpBackend.verifyNoOutstandingExpectation();
            $httpBackend.verifyNoOutstandingRequest();
        });

        it('should send msg to server', function () {
            /**
             * 1. when you are clicking the same sequence on javascript like in backend
             * 2. you should win
             *
             * a) every click should provide to change of tile content
             *      --  to proper symbol
             * b) and at the end you should see some "win" message
             */




            $httpBackend.whenPOST('/controller/takeTile/row/1/column/1').respond(201, {
                row: 1,
                column: 1
            });

            scope.takeTile('/row/1/column/1');
            expect(scope.tile).toEqual({row: 1, column: 1});
            $httpBackend.flush();
        });
    });

});