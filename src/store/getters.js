import _ from 'lodash';

export const getters = {
    chosenGallery: state => {
      let idAsKeys = _.mapKeys(state.galleryList, 'id');
      return idAsKeys;
    },
    singleGallery: state => {
      return state.gallerySingle;
    }
}