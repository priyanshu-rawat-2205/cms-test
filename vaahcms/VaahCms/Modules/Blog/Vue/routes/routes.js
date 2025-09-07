let routes= [];

import dashboard from "./vue-routes-dashboard";
import blog from "./vue-routes-blogs"
import categories from "./vue-routes-categories"
import tags from "./vue-routes-tags"

routes = routes.concat(dashboard);
routes = routes.concat(blog);
routes = routes.concat(categories);
routes = routes.concat(tags);

export default routes;
