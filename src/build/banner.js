'use strict'

const pkg = require('../../package.json')
const year = new Date().getFullYear()

function getBanner(pluginFilename) {
  return `/*!
  * Alder Stone${pluginFilename ? ` ${pluginFilename}` : ''} v${pkg.version}
  * Copyright ${year} Nicolae Mihai; portions copyright 2013-2022 The Understrap Authors
  * Licensed under ${ pkg.license }
  */`
}

module.exports = getBanner
