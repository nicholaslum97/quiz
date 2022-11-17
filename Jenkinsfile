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
        sh "docker-compose up"
      }
    }
  }
  
  post {
    success {
      dependencyCheckPublisher pattern: 'dependency-check-report.xml'
    }
  }
}