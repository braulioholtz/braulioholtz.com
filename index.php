<!doctype html>
<html lang="pt" ng-app="BraulioApp" ng-controller="BraulioController" >

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-TileColor" content="#0d47a1">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0-rc4/angular-material.min.css">
    <title ng-bind="results.MyName"></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <style type="text/css">
        md-card {
            background: #FFF;
            margin: 15px;
        }
        
        md-toolbar {
            padding-left: 100px;
        }
        
        md-toolbar h2 {
            color: #FFF;
            margin-left: 100px;
        }
        [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
          display: none !important;
        }
        .preview-scale {
        color: #888;
        font-size: 12px;
        margin-top: 24px; }
    </style>
</head>

<body layout="column" layout-fill ng-cloak>

    <md-toolbar layout="row" class="md-toolbar-tools md-whiteframe-z2" style="padding-left: 50px;">
        <h2 ng-bind="results.MyName"></h2>
        <span flex></span>
        <md-button class="md-icon-button" aria-label="More" href="mailto:{{ results.myEmail }}" target="_blank" ng-click="Enter('email')">
          <md-icon md-font-set="material-icons">email</md-icon>
        </md-button>
    </md-toolbar>

    <md-content flex style="padding: 0 30px;">
        <div flex-xs="100">
            <md-card>
                <md-card-title>
                    <md-card-title-text>
                        <span class="md-headline"><md-icon  md-font-set="material-icons">collections</md-icon> Social</span>
                    </md-card-title-text>
                </md-card-title>
                <md-card-content  layout="row">
                    <div ng-repeat="s in results.social" flex  layout-align="center center" layout="column">
                        <div flex></div>
                        <div class="preview-glyphs">
                            <md-button href="{{ s.href }}" target="_blank"  ng-click="EnterSocial(s.name)">
                                <md-icon md-svg-src="{{ s.icon }}" aria-label="{{ s.name }}" style="width: 40px; height: 40px;"></md-icon>
                            </md-button>
                        </div>
                        <div class="preview-scale" ng-bind="s.name"></div>
                    </div>
                </md-card-content>
            </md-card>

            <md-card>
                <md-card-title>
                    <md-card-title-text>
                        <span class="md-headline"><md-icon  md-font-set="material-icons">build</md-icon> Habilidades e Competências</span>
                    </md-card-title-text>
                </md-card-title>
                <md-card-content  ng-bind-html="results.myDescription">
                </md-card-content>
            </md-card>

            <md-card>
                <md-card-title>
                    <md-card-title-text>
                        <span class="md-headline"><md-icon  md-font-set="material-icons">work</md-icon> Experiências</span>
                    </md-card-title-text>
                </md-card-title>
                <md-card-content>
                    <md-list>
                        <md-list-item ng-repeat="ex in results.experiences">
                            <div class="md-list-item-text">
                                <div class="md-title">{{ ex.entity }} – {{ ex.company }}</div>
                                <div class="md-subhead" ng-bind="ex.date"></div>
                                <p ng-bind="ex.description"></p>
                                <p ng-if="ex.description != ''"><strong>Tecnologias:</strong> {{ ex.description }}</p>
                            </div>
                            <md-divider ng-if="!$last"></md-divider>
                        </md-list-item>
                    </md-list>
                </md-card-content>
            </md-card>

            <md-card>
                <md-card-title>
                    <md-card-title-text>
                        <span class="md-headline"><md-icon  md-font-set="material-icons">local_library</md-icon> Formação</span>
                    </md-card-title-text>
                </md-card-title>
                <md-card-content>
                    <md-list>
                        <md-list-item class="md-3-line" ng-repeat="ed in results.education">
                            <div class="md-list-item-text">
                                <div class="md-title">{{ ed.subject }} – {{ ed.company }}</div>
                                <div class="md-subhead" ng-bind="ed.date"></div>
                            </div>
                            <md-divider ng-if="!$last"></md-divider>
                        </md-list-item>
                    </md-list>
                </md-card-content>
            </md-card>

            <md-card>
                <md-card-title>
                    <md-card-title-text>
                        <span class="md-headline"><md-icon md-font-set="material-icons">translate</md-icon> Idiomas</span>
                    </md-card-title-text>
                </md-card-title>
                <md-card-content>
                    <md-list-item class="md-3-line" ng-repeat="l in results.languages">
                        <div class="md-list-item-text">
                            <div class="md-title" ng-bind="l.language"></div>
                            <div class="md-subhead" ng-bind="l.level"></div>
                        </div>
                        <md-divider ng-if="!$last"></md-divider>
                    </md-list-item>
                </md-card-content>
            </md-card>
        </div>


    </md-content>

    <md-fab-speed-dial md-direction="up" class=" md-scale md-fab-bottom-right ">
        <md-fab-trigger>
            <md-button aria-label="Download" class="md-fab md-warn" href="{{ results.download }}" target="_blank"  ng-click="Enter('Download')">
                <md-icon md-font-set="material-icons">file_download</md-icon>
            </md-button>
        </md-fab-trigger>
    </md-fab-speed-dial>

    <!-- Angular Material requires Angular.js Libraries -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-sanitize.min.js"></script>

    <!-- Angular Material Library -->
    <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0-rc4/angular-material.min.js"></script>
    <script src="app.js"></script>
</body>

</html>