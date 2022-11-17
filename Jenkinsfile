pipeline {
  agent any
  stages {
    stage('Checkout') {
      steps {
        checkout scm
      }
    }
    
    stage('Docker compose') {
      steps {
        sh "docker compose up"
      }
    }
    
    stage('OWASP DependencyCheck') {
      steps {
        dependencyCheck additionalArguments: '--format HTML --format XML ' , odcInstallation: 'Default'
      }
    }
    stage('Code Quality Check via SonarQube') {
      steps {
	script {
		def scannerHome = tool 'SonarQube';
			withSonarQubeEnv('SonarQube') {
			sh "${scannerHome}/bin/sonar-scanner -Dsonar.projectKey=OWASP -Dsonar.sources=."
			}
		}
	    }
	}
  }
  
  post {
    always {
      recordIssues enabledForFailure: true, tool: sonarQube()
    }
    success {
      dependencyCheckPublisher pattern: 'dependency-check-report.xml'
    }
  }
}
