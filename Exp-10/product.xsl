<?xml version="1.0" encoding="UTF-8"?>


<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  
  <!-- Root template to apply to the entire XML document -->
  <xsl:template match="/">
    <html>
      <body>
        <h2>Product Information</h2>
        <table border="1">
          <tr>
            <th>Product Name</th>
            <th>Details</th>
            <th>Price</th>
          </tr>
          <!-- Apply the 'product' template to display the product details -->
          <xsl:apply-templates select="product" />
        </table>
      </body>
    </html>
  </xsl:template>
  
  <!-- Template for the 'product' element -->
  <xsl:template match="product">
    <tr>
      <td><xsl:value-of select="description/name" /></td>
      <td><xsl:value-of select="description/details" /></td>
      <td><xsl:value-of select="description/price" /></td>
    </tr>
  </xsl:template>

</xsl:stylesheet>
