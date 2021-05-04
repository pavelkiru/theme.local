import './scss/styles.scss'

import './js/module1'
import './js/module2'

/*
 * import from NODE MODULES
 * eg: npm i owl.carousel
 *
 * import 'owl.carousel/dist/assets/owl.carousel.css';
 *	 import 'owl.carousel';
*/

/*
 * This enables application of JS modules changes in HTML view.
 * Don't remove it!
 */
 
if (module.hot) {
  module.hot.accept();
}
