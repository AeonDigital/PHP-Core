#!/bin/bash

GIT_ACTIVE_BRANCH=$(git branch --show-current)


#
# Identifica se a branch atual refere-se ao 'main'
if [ "${GIT_ACTIVE_BRANCH}" != "main" ]; then
  echo "Alterne para a branch principal \"main\""
  echo ":: git checkout main"
else
  #
  # Identifica se existem alterações não comitadas
  if [ $(git status --porcelain | wc -l) -gt "0" ]; then
    echo "Foram encontradas alterações não comitadas."
    echo "Efetue o commit das alterações para prosseguir."
    echo ":: git add ."
    echo ":: git commit -m \"message\""
    echo ":: git push origin main"
  else
    GIT_ATUAL_TAG=$(git describe --abbrev=0 --tags)
    TAG_SPLIT=(${GIT_ATUAL_TAG//-/ })
    TAG_RAW_VERSION=(${TAG_SPLIT[0]//[!0-9.]/ })


    VERSION_SPLIT=(${TAG_RAW_VERSION//\./ })
    
    PROJECT_VERSION_MAJOR=${VERSION_SPLIT[0]}
    PROJECT_VERSION_MINOR=${VERSION_SPLIT[1]}
    PROJECT_VERSION_PATCH=${VERSION_SPLIT[2]}
    PROJECT_VERSION_STABILITY=("-"${TAG_SPLIT[1]})

    ISOK=1;

    if [ "$1" == "version" ]; then
      if [ "$2" == "patch" ]; then
        PROJECT_VERSION_PATCH=$((PROJECT_VERSION_PATCH+1))
      else
        if [ "$2" == "minor" ]; then
          PROJECT_VERSION_MINOR=$((PROJECT_VERSION_MINOR+1))
          PROJECT_VERSION_PATCH=0
        else
          if [ "$2" == "major" ]; then
            PROJECT_VERSION_MAJOR=$((PROJECT_VERSION_MAJOR+1))
            PROJECT_VERSION_MINOR=0
            PROJECT_VERSION_PATCH=0
          else
            ISOK=0;
          fi
        fi
      fi
    else
      if [ "$1" == "stability" ]; then
        if [ "$2" == "alpha" ] || [ "$2" == "beta" ] || [ "$2" == "cr" ] || [ "$2" == "r" ]; then
          if [ "$2" == "r" ]; then
            PROJECT_VERSION_STABILITY=""
          else 
            PROJECT_VERSION_STABILITY="-$2"
          fi
        else
          ISOK=0;
        fi
      else
        ISOK=0;
      fi
    fi



    if [ "${ISOK}" == "0" ]; then
      echo "Parametros incorretos: [ ${1}; ${2} ]."
      echo "Nenhuma ação foi realizada."
    else
      NEW_VERSION="v${PROJECT_VERSION_MAJOR}.${PROJECT_VERSION_MINOR}.${PROJECT_VERSION_PATCH}${PROJECT_VERSION_STABILITY}"

      git tag ${NEW_VERSION}
      git push --tags origin
    fi
  fi
fi 
