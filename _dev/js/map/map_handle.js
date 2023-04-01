export default () => {
  const mapDiv = document.querySelector('#map');
  if(!mapDiv) return;

  import(/* webpackChunkName: "print" */ "./map_init").then(
		(module) => {
			const map_init = module.default;
			map_init();
		}
	);
}